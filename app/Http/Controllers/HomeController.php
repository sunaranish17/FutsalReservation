<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

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

                $query_item = DB::table('users')->where('type', '2')->get();
                
                $items = collect();

                foreach($query_item as $q){
                    $sn = $q->id;
                    $name = $q->name;
                    $city = DB::table('locations')->where('cid', $sn)->get()['0']->city;
                    $tole = DB::table('locations')->where('cid', $sn)->get()['0']->tole;
                    $time_start = DB::table('working_hours')->where('cid', $sn)->get()['0']->time_start;
                    $time_end = DB::table('working_hours')->where('cid', $sn)->get()['0']->time_end;
                    $time =  date('ha ', strtotime($time_start)) . "-" . date(' ha', strtotime($time_end));
                    /* dd($time); */

                    $item = collect(['sn' => $sn, 'name' => $name, 'city' => $city, 'tole' => $tole, 'time' => $time]);
                    $items->push($item);
                }

                /* foreach($items as $c){ */
                /*     dd($c); */
                /* } */

                return view('back.user.userdashboard',compact('items'));
            }
            else
                return view('back.arena.arena');
        }
         else
        return view('admin');
    }

    public function book($id){
            return view('front.pages.booking');
    }


    public function logout()
        {
            auth::logout();
            return view('front.home');
        }

}
