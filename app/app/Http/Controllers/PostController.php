<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Spot;
use App\Like;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateData;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        $posts = Post::withCount('likes')->orderBy('created_at', 'desc')->paginate(10);

        return redirect()->route('posts.show', $data ,compact('trRecords', 'from', 'until'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        $posts = new Post;

        $file_name = $request->file('image_path')->getClientOriginalName();
        $request->file('image_path')->storeAs('public/images', $file_name);

        $posts->user_id = Auth::id();
        $posts->spot_id = $request->spot_id;
        $posts->title = $request->title;
        $posts->date = $request->date;
        $posts->pref_id = $request->pref_id;
        $posts->city = $request->city;
        $posts->image_path = $file_name;
        $posts->episode = $request->episode;

        $posts->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        $like_model = new Like;

        $user_id = Auth::id();
        $from = $request->input('from');
        $until = $request->input('until');
        $part_search = $request->input('part_search');
        $menu_search = $request->input('menu_search');
        $q = Post::query();

        // 全件取得(検索かけなかったら全件表示)
        $query = $q->withCount('likes')->where('pref_id',$id)->where('user_id', $user_id)
        ->orderBy('date', 'desc');

        // 日付検索
        if (isset($from) && isset($until)) {
            $query = $q->whereBetween("date", [$from, $until])
            ->where('user_id', $user_id)
            ->where('pref_id',$id);
        }

        $post = $query->paginate(5);


        return view('post_list',[
            'all_post'=>$post,
            'like_model'=>$like_model,
            'from'=>$from,
            'until'=>$until,
            'pref_id'=>$id,
        
            ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $prefs = Spot::all();

        return view('my_post_edit',[
            'prefs' => $prefs,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, $id)
    {
        //更新処理
        $post = Post::find($id);
        $post->date = $request->date;
        $post->title = $request->title;
        $post->city = $request->city;
        $post->spot_id = $request->spot_id;
        $post->episode = $request->episode;
        $post->save();
        
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('users.index');
    }


    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $like = new Like;
        $post = Post::findOrFail($post_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }
}
