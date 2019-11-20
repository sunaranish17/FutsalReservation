@extends('front.layout.master')

@section('content')
<div class="row">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    search for Suitable ARENa
                </div>
            </div>
        </div>
    </div>
</div>




                <div class="col-md-8">
                    <h1 class="heading">Pitch Booking</h1>
                    <p> Futsal is played between two teams of five players each, one of whom is the goalkeeper. </p>
                   
                </div>
                <div class="col-md-4">
                    <img src="{{url('frontend/img/futsal.jpg')}}" alt="" class="img-responsive">
                </div>
         <!-- /booking -->
    
    <!-- logout  -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                      <a href="{{url('logout')}}"><button class="btn primary_btn">Logout</button></a>   
            </div>
        </div>
    </section>
     <!-- /logout -->

    <!-- contact -->
    <section class="section-padding" id="contact">
        <div class="container">
            <h1 class="heading">Contact</h1>
            <div class="row">
                <div class="col-md-6">
                    <form action="">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone No.</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" rows="6"></textarea>
                        </div>
                        <input type="submit" class="btn primary_btn" name="" value="SEND">
                    </form>
                </div>
                <div class="col-md-6 thumbnail">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d883.2073119907258!2d85.33114244050167!3d27.691671895068417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19bce4d92a85%3A0xaae783aa70f5bdd!2sMount+Strada+Barista+Coffee+School!5e0!3m2!1sen!2snp!4v1522128544986" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- /contact -->
@endsection
