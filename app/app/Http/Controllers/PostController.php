<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Spot;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post_list');
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
    public function store(Request $request)
    {
        $posts = new Post;

        $file_name = $request->file('image_path')->getClientOriginalName();
        // $file_name->storeAs('public/images', $file_name);
        $request->file('image_path')->storeAs('public/images', $file_name);

        $posts->user_id = Auth::id();
        $posts->spot_id = $request->spot_id;
        $posts->title = $request->title;
        $posts->date = $request->date;
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
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //更新処理
        $post = Post::find($id);
            // 'spot_id' => $request->spot_id,
            // 'title' => $request->title,
            // 'date' =>$request->date,
            // 'episode' =>$request->episode,
            $post->title = $request->title;
            $post->date = $request->date;
            $post->spot_id = $request->spot_id;
            $post->episode = $request->episode;
            $post->save();
            
            return redirect()->route('users.index');
            // return redirect('my_page_list'));
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
}
