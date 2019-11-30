<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Booking;
use Auth;
use DB;
use \Exception;

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

                    # Handle error if company didn't save detail 
                    try {
                        $city = DB::table('locations')->where('cid', $sn)->get()['0']->city;
                    }
                    catch (\Exception $e) {
                        $city = "";
                    }

                    try {
                        $tole = DB::table('locations')->where('cid', $sn)->get()['0']->tole;
                    }
                    catch (\Exception $e) {
                        $tole = "";
                    }

                    try {
                        $time_start = DB::table('working_hours')->where('cid', $sn)->get()['0']->time_start;
                    }
                    catch (\Exception $e) {
                        $time_start = "";
                    }

                    try {
                        $time_end = DB::table('working_hours')->where('cid', $sn)->get()['0']->time_end;
                    }
                    catch (\Exception $e) {
                        $time_end = "";
                    }
                    /* $city = DB::table('locations')->where('cid', $sn)->get()['0']->city; */
                    /* $tole = DB::table('locations')->where('cid', $sn)->get()['0']->tole; */
                    /* $time_start = DB::table('working_hours')->where('cid', $sn)->get()['0']->time_start; */
                    /* $time_end = DB::table('working_hours')->where('cid', $sn)->get()['0']->time_end; */
                    $time =  date('ha ', strtotime($time_start)) . "-" . date(' ha', strtotime($time_end));

                    $item = collect(['sn' => $sn, 'name' => $name, 'city' => $city, 'tole' => $tole, 'time' => $time]);
                    $items->push($item);
                }
                return view('back.user.userdashboard',compact('items'));
            }
            else {
                return redirect('arena');
            }
        }
         else
        return view('admin');
    }

    public function book(Request $request, $id){
        $form_data = $request->all();

        $cid = $id;
        $cuid = Auth::user()->id;
        $phone = $form_data['phone'];
        $date = $form_data['date'];
        $time = $form_data['time'];
        $message = $form_data['message'];
        /* $data = collect(['cid' => $cid, 'cuid' => $cuid, 'phone' => $phone, 'date' => $date, 'time' => $time, 'message' => $message]); */
        /* dd($data); */

        # Enter data to table booking
        $book = new Booking;
        $book->cid=$cid;
        $book->cuid=$cuid;
        $book->phone=$phone;
        $book->date=$date;
        $book->time=$time;
        $book->message=$message;
        $book->save();

        return redirect('auths');
    }

    public function book1($id){
            return view('front.pages.booking');
    }


    public function logout()
        {
            auth::logout();
            return view('front.home');
        }

}
