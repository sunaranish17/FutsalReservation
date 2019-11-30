<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\WorkingHour;
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

        $query_item = DB::table('bookings')->where('cid', Auth::user()->id)->get();
        return view('back.arena.arena', compact('query_item'));
    }

    public function indexDelete(Request $request, $id)
    {
        DB::table('bookings')->where('id', '=', $id)->delete();
        return redirect('arena');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uid = Auth::user()->id;
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
        /* $locdata = DB::table('companies') */
        /* ->join('locations','locations.id','=','companies.id') */
        /* ->select('locations.*') */
        /* ->get(); */

        # Compare auth user id with cid in table
        $locdata = DB::table('locations')->where('cid', Auth::user()->id)->get();

        if(empty($locdata->all())){
            # If data doesn't exits, else create null field 
            $locdata->id=Auth::user()->id;
            $locdata->state=NULL;
            $locdata->zone=NULL;
            $locdata->district=NULL;
            $locdata->city=NULL;
            $locdata->ward=NULL;
            $locdata->tole=NULL;
            return view('back.arena.pages.location.locationdetail',compact('locdata'));

        } else {
            # Fill form with previous data, 
            $locdata=$locdata['0'];
            return view('back.arena.pages.location.locationdetail',compact('locdata'));
        }

    }

    public function locUpdate(Request $request, $id)
    {
        # Check if $id match with cid in location table
        # Here $id is auth:user id
        $address=Location::where('cid', $id)->first();

        # If location table in database is empty; create new row
        if($address === NULL) {
            $address = new Location;
        }

        $address->cid=$id;
        $address->state=$request->state;
        $address->zone=$request->zone;
        $address->district=$request->district;
        $address->city=$request->city;
        $address->ward=$request->ward;
        $address->tole=$request->tole;
        $address->save();
        return redirect('location');

    }
    public function working_hour()
    {
        # Compare auth user id with cid in table
        $data = DB::table('working_hours')->where('cid', Auth::user()->id)->get();

        if(empty($data->all())){
            # If data doesn't exits, else create default field 
            $data->id=Auth::user()->id;
            $data->Sunday="checked";
            $data->Monday="checked";
            $data->Tuesday="checked";
            $data->Wednesday="checked";
            $data->Thursday="checked";
            $data->Friday="checked";
            $data->Saturday="checked";
            $data->time_start="08:00";
            $data->time_end="18:00";
            return view('back.arena.pages.working_hour.working_hour',compact('data'));

        } else {
            # Else fill form with previous data, 
            $data=$data['0'];
            return view('back.arena.pages.working_hour.working_hour',compact('data'));
        }
    }

    public function working_hour_update(Request $request, $id)
    {
        # Check if $id match with cid in WrokingHour table
        # Here $id is auth:user id
        $working_hour=WorkingHour::where('cid', $id)->first();

        if($working_hour === NULL) {
            # If WorkingHour table in database is empty; create new row
            $working_hour = new WorkingHour;
        }

        $working_hour->id=$id;
        $working_hour->cid=$id;

        if($request->sun=='on'){
            $working_hour->Sunday="checked";
        } else {
            $working_hour->Sunday=NULL;
        }

        if($request->mon=='on'){
            $working_hour->Monday="checked";
        } else {
            $working_hour->Monday=NULL;
        }

        if($request->tue=='on'){
            $working_hour->Tuesday="checked";
        } else {
            $working_hour->Tuesday=NULL;
        }

        if($request->wed=='on'){
            $working_hour->Wednesday="checked";
        } else {
            $working_hour->Wednesday=NULL;
        }

        if($request->thur=='on'){
            $working_hour->Thursday="checked";
        } else {
            $working_hour->Thursday=NULL;
        }

        if($request->fri=='on'){
            $working_hour->Friday="checked";
        } else {
            $working_hour->Friday=NULL;
        }

        if($request->sat=='on'){
            $working_hour->Saturday="checked";
        } else {
            $working_hour->Saturday=NULL;
        }

        $working_hour->time_start=$request->start_time;
        $working_hour->time_end=$request->end_time;
        $working_hour->save();
        return redirect('working_hour');
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
