@extends('back.arena.layout.master')

@section('content')

<!--main content start-->
   <section id="main-content">
     <section class="wrapper">
       <!--overview start-->
       <div class="row">
         <div class="col-lg-12">

             <div class="col-md-6">
              <li><i class="fa fa-home"></i><a href="{{url('admin')}}">Home</a> | Setting</li>
              </div>
         </div>
       </div>
       
       @foreach($data as $data)
          
       <form method="post" action="{{url('setting/update')}}/{{$data->id}}" enctype="multipart/form-data">
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
                    <div class="col-md-3"><label >Company:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="company_name"  name="company_name" value=""></div>
                  </div>
                  <br>
                  <!-- End of Company -->

                  <!-- location  -->
                  <div class="row">
                    <div class="col-md-3"><label >Address:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="location"  name="location" value=""></div>
                  </div>  
                  <br>
                  <!-- End of location -->

                  <!-- Cotact  -->
                  <div class="row">
                    <div class="col-md-3"><label >Contact:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="contact"  name="contact" value="{{$data->contact}}"></div>
                  </div>  
                  <br>
                  <!-- End of Contact -->



                  <!-- Description  -->
                  <div class="row">
                    <div class="col-md-3"><label >Description:</label></div>
                   <div class="col-md-9"><textarea cols="30" id="description"> </textarea></div>
                  </div>
                  <!-- End of Description -->

                </div>
              </div>
              <!-- End of Company Content -->
              <br>
              <!-- Social Link -->
                <!-- Social Link Bar-->
                  <div class="row">
                    <div class="col-lg-12">
                      <ol class="breadcrumb">
                        <div class="row">
                          <div class="col-md-12">
                            <li><i class="fa fa-link"></i>Social Link</li>
                          </div>
                        </div>
                      </ol>
                    </div>
                  </div>
                  <!-- End of Social Link Bar-->

              <div class="form-wrapper well">
                <div class="form-group">
                  
                  <!-- facebook  -->
                  <div class="row">
                    <div class="col-md-3"><label >Facebook:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="facebook" name="facebook" value="{{$data->facebook}}"></div>
                  </div>
                  <br>
                  <!-- End of facebook -->

                  <!-- googlemap  -->
                  <div class="row">
                    <div class="col-md-3"><label >Google Map:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="googleMap" name="googleMap" value="{{$data->googleMap}}"></div>
                  </div>  
                  <br>
                  <!-- End of googlemap -->

                  <!-- googleplus  -->
                  <div class="row">
                    <div class="col-md-3"><label >Google Plus:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="googlePlus"  name="googlePlus" value=#></div>
                  </div>  
                  <br>
                  <!-- End of googleplus -->

                  <!-- Twitter  -->
                  <div class="row">
                    <div class="col-md-3"><label >twitter:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="twitter"  name="twitter" value="{{$data->twitter}}"></div>
                  </div>  
                  <br>
                  <!-- End of twitter -->

                  <!-- instagram  -->
                  <div class="row">
                    <div class="col-md-3"><label >Instagram:</label></div>
                    <div class="col-md-9"><input type="text" class="form-control" id="instagram"  name="instagram" value="3"></div>
                  </div>
                  <!-- End of instagram -->
                </div>
              </div>

              <!-- End of Social Link -->
            </div>
      <!-- End of Left Content -->

    
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




