<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Company;
use DB;
use App\user;
use Auth;

class ArenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
         return view('back.arena.arena');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $uid = Auth::user()->id;


        // $data = DB::table('companies')
        // ->join('users', 'users.id', '=', 'companies.uid')
        // ->where('companies.uid','=',$uid)
        // ->get();

        $data = DB::table('companies')
        ->join('users','users.id','=','companies.uid')
        ->select('companies.*','users.name')
        ->get();

       // dd($data);

        //$value = DB::select("SELECT * FROM companies JOIN users ON users.id = companies.uid" );
        //dd($value);

       
        
       // $data=Company::find($value);
        return view('back.arena.pages.arenainfo', compact('data'));
        //return view('back.arena.pages.arena');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function location()
    {
        $locdata = DB::table('companies')
        ->join('locations','locations.id','=','companies.id')
        ->select('locations.*')
        ->get();

       // dd($data);

        //$locdata=Location::find($data);
        return view('back.arena.pages.location.locationdetail',compact('locdata'));
    }

    public function locUpdate(Request $request, $id)
    {
        //
         $address=Location::find($id);
         $address->state=$request->state;
         $address->zone=$request->zone;
         $address->district=$request->district;
         $address->city=$request->city;
         $address->ward=$request->ward;
         $address->tole=$request->tole;
         $address->save();
         return redirect('location');

    }

    public function rate()
    {

        $ratedata = DB::table('companies')
        ->join('rates','rates.id','=','rates.id')
        ->select('rates.*')
        ->get();

        //dd($ratedata);

        //$locdata=Location::find($data);
        return view('back.arena.pages.rates.ratesdetail',compact('ratedata'));
    }

    public function rateUpdate(Request $request, $id)
    {
        $price=Rate::find(id);
        $price->perHour=$request->per_hour;
        $price->perDay=$request->per_day;
        $price->save();
        return redirect('rate');
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
        //
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
        //
         $setting=Company::find($id);
        // $setting->companyName=$request->company_name;
        // $setting->location=$request->location;
         $setting->contact=$request->contact;
        // $setting->description=$request->description;
         $setting->facebook=$request->facebook;
         $setting->twitter=$request->twitter;
         $setting->googleMap=$request->googleMap;
         $setting->save();
         return redirect('setting');

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
}
