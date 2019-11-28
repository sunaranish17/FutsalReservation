@extends('back.arena.layout.master')
@section('content')

<style>
    body{
        padding: 50px;
    }

    label{
        position: relative;
        cursor: pointer;
        color: #666;
        font-size: 30px;
    }

    input[type="checkbox"], input[type="radio"]{
        position: absolute;
        right: 9000px;
    }

    /*Check box*/
    input[type="checkbox"] + .label-text:before{
        content: "\f096";
        font-family: "FontAwesome";
        speak: none;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing:antialiased;
        width: 1em;
        display: inline-block;
        margin-right: 5px;
    }

    input[type="checkbox"]:checked + .label-text:before{
        content: "\f14a";
        color: #2980b9;
        animation: effect 250ms ease-in;
    }

    input[type="checkbox"]:disabled + .label-text{
        color: #aaa;
    }

    input[type="checkbox"]:disabled + .label-text:before{
        content: "\f0c8";
        color: #ccc;
    }

    /*Radio box*/

    input[type="radio"] + .label-text:before{
        content: "\f10c";
        font-family: "FontAwesome";
        speak: none;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing:antialiased;
        width: 1em;
        display: inline-block;
        margin-right: 5px;
    }

    input[type="radio"]:checked + .label-text:before{
        content: "\f192";
        color: #8e44ad;
        animation: effect 250ms ease-in;
    }

    input[type="radio"]:disabled + .label-text{
        color: #aaa;
    }

    input[type="radio"]:disabled + .label-text:before{
        content: "\f111";
        color: #ccc;
    }

    /*Radio Toggle*/

    .toggle input[type="radio"] + .label-text:before{
        content: "\f204";
        font-family: "FontAwesome";
        speak: none;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing:antialiased;
        width: 1em;
        display: inline-block;
        margin-right: 10px;
    }

    .toggle input[type="radio"]:checked + .label-text:before{
        content: "\f205";
        color: #16a085;
        animation: effect 250ms ease-in;
    }

    .toggle input[type="radio"]:disabled + .label-text{
        color: #aaa;
    }

    .toggle input[type="radio"]:disabled + .label-text:before{
        content: "\f204";
        color: #ccc;
    }


    @keyframes effect{
        0%{transform: scale(0);}
        25%{transform: scale(1.3);}
        75%{transform: scale(1.4);}
        100%{transform: scale(1);}
    }
</style>

<!--main content start-->
   <section id="main-content">
     <section class="wrapper">
       <!--overview start-->
       <div class="row">
         <div class="col-lg-12">

             <div class="col-md-6">
              <li><i class="fa fa-home"></i><a href="{{url('admin')}}">Home</a> | location</li>
              </div>
         </div>
       </div>
       
       <form method="post" action="{{url('working_hour/update')}}/{{$data->id}}" enctype="multipart/form-data">
        @csrf
        <!-- Main Content -->
            <div class="container">
                <div class="col-md-5">
                    <h2>Select Working days of Week</h2>
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="sun" {{$data->Sunday}}> <span class="label-text">Sunday</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="mon" {{$data->Monday}}> <span class="label-text">Monday</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="tue" {{$data->Tuesday}}> <span class="label-text">Tuesday</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="wed" {{$data->Wednesday}}> <span class="label-text">Wednesday</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="thur" {{$data->Thursday}}> <span class="label-text">Thursday</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="fri" {{$data->Friday}}> <span class="label-text">Friday</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="sat" {{$data->Saturday}}> <span class="label-text">Saturday</span>
                        </label>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <h2>Start Time</h2>
                        <input type="time" class="form-control" name="start_time" value={{$data->time_start}} >
                    </div>
                        <div class="form-group">
                        <h2>End Time</h2>
                        <input type="time" class="form-control" name="end_time" value={{$data->time_end}}>
                    </div>
                </div>

            </div>
          
          <!-- Button Bar -->
            <div class="row">
                <div class="col-lg-12">
                <ol class="breadcrumb">
                    <div class="row">
                        <div class="col-md-12">
                            <button style="float: right;" class="btn btn-primary"><b>Update</b></button>
                        </div>
                    </div>
                </ol>
                </div>
            </div>
          <!-- End of Button Bar -->
        </form>
     </section>
   </section>

@endsection

