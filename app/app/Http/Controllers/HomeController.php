<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spot;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prefs = Spot::all();
        // dd($prefs);
        // spotテーブルから値を取得
        // all
        // home blade にもっていく

        return view('home',[
            'prefs' => $prefs,
        ]);
    }
}
