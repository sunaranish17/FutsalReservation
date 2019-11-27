@extends('back.arena.layout.master')

@section('content')

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
       
       @foreach($locdata as $locdata)
          
       <form method="post" action="{{url('location/update')}}/{{$locdata->id}}" enctype="multipart/form-data">
        @csrf
    <!-- Main Content -->
        <div class="row">
      <!-- left Content -->
            <div class="col-lg-8">
              <!-- location Content -->
              <div class="form-wrapper well">
                <div class="form-group">
                  
                  <!-- State  -->
                  <div class="row">
                    <div class="col-md-3"><label >State:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="state"  name="state" value="{{$locdata->state}}"></div>
                  </div>
                  <br>
                  <!-- End of State -->

                  <!-- location  -->
                  <div class="row">
                    <div class="col-md-3"><label >Zone:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="zone"  name="zone" value="{{$locdata->zone}}"></div>
                  </div>  
                  <br>
                  <!-- End of location -->

                  <!-- Cotact  -->
                  <div class="row">
                    <div class="col-md-3"><label >District:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="district"  name="district" value="{{$locdata->district}}"></div>
                  </div>  
                  <br>
                  <!-- End of Contact -->



                  <!-- City  -->
                  <div class="row">
                    <div class="col-md-3"><label >City:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="city"  name="city" value="{{$locdata->city}}"></div>
                  </div>
                  </div>
                  <!-- End of City -->

                  
                  <!-- Ward  -->
                  <div class="row">
                    <div class="col-md-3"><label >Ward:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="ward"  name="ward" value="{{$locdata->ward}}"></div>
                  </div>
                  </div>
                  <!-- End of Ward -->

                  
                  <!-- Tole  -->
                  <div class="row">
                    <div class="col-md-3"><label >Tole:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="tole"  name="tole" value="{{$locdata->tole}}"></div>
                  </div>
                  </div>
                  <!-- End of Tole -->

                </div>
              </div>
              <!-- End of location Content -->
              <br>

            </div>
      <!-- End of Left Content -->

        </div>
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




