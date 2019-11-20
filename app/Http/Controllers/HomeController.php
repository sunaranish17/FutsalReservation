<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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
        $type=Auth::user()->type;

        if($type!=0){
            if($type==1){
                return view('back.user.userdashboard');
                        }
                else
                    return view('back.arena.arena');
        }
         else
        return view('admin');
    }

    public function logout()
        {
            auth::logout();
            return view('front.home');
        }

}
