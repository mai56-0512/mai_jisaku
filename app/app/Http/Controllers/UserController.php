<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Spot;
use App\User;
use App\Http\Requests\CreateData;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = DB::table('posts')->where('user_id',$id)->get();
        $role = Auth::user()->role_id;
        $account = Auth::user();

        return view('my_page_list',[
            'my_user'=>$user,
            'account'=>$account,
        ]);
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
        //
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
        return redirect()->route('users.update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request)
    {
        $request->validate([
            'name'=>'required|max:20',
        ]);

        $account = Auth::user();

        $account->name = $request->name;
        
        $account->save();
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
        //    
    }

    public function badCount(Request $request)
    {

      $user = User::find($request->user_id);
      $user->count=$user->count+1;
      $user->save();

      return redirect()->route('posts.show',$request->pref_id);
    }

    public function stop(Request $request)
    {
        $user = User::find($request->user_id);
        $user->del_flg = 1;
        $user->save();

        return redirect()->route('admin.index');
    }

}