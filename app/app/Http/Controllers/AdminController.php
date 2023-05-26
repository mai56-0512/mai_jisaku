<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function create()
    {

        return view('admin/register');
    }

    public function store(Request $data)
    {
        $users = User::where('role',0)->first();
        // dd($data['email']);
        if($users['email']==$data['email']){
                return view('admin/register',[
                    'users'=>$users,
                    'email'=>$data['email'],
                ]);
                
            }else{
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role'=>0,
                ]);
                Auth::login($user);
                return redirect()->route('home');
            }

    }

    public function index()
    {
        $user = DB::table('users')->where('role',1)->orderBy('count','desc')->get();

        return view('admin',[
            'user_list'=>$user,
    ]);
    }
}
