@extends('back.arena.layout.master')

@section('content')

<!--main content start-->
   <section id="main-content">
     <section class="wrapper">
       <!--overview start-->
       <div class="row">
         <div class="col-lg-12">

             <div class="col-md-6">
              <li><i class="fa fa-home"></i><a href="{{url('admin')}}">Home</a> | Rates</li>
              </div>
         </div>
       </div>
       
       @foreach($ratedata as $ratedata)
       
       
          
       <form method="post" action="{{url('rate/update')}}/{{$ratedata->id}}" enctype="multipart/form-data">
        @csrf
    <!-- Main Content -->
        <div class="row">
      <!-- left Content -->
            <div class="col-lg-8">
              <!-- Company Content -->
              <div class="form-wrapper well">
                <div class="form-group">
                  
                  <!-- Company  -->
                  <div class="row">
                    <div class="col-md-3"><label >Per Hour:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="per_hour"  name="per_hour" value="{{$ratedata->perHour}}"></div>
                  </div>
                  <br>
                  <!-- End of Company -->

                  <!-- location  -->
                  <div class="row">
                    <div class="col-md-3"><label >Per Day:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="per_day"  name="per_day" value="{{$ratedata->perDay}}"></div>
                  </div>  
                  <br>
                  <!-- End of location -->

                 
    
          <br>
    <!-- End of Main Content Form -->
          
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
        @endforeach
     </section>
   </section>

@endsection





