@extends('front.layout.master')
@section('content')

<style>
  /* Popup Box */
  /* The Modal (background) */
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 8888; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  /* Modal Content/Box */
  .modal-content {
  background-color: #fefefe;
  margin: 10vh auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 60%; /* Could be more or less, depending on screen size */
  }
  @media (min-width: 1366px) {
  .modal-content {
  background-color: #fefefe;
  margin: 10vh auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
  }
  }

  h2, p {
  margin: 0 0 20px;
  font-weight: 400;
  color: #666;
  }
  span{
  color: #666;
  display:block;
  padding:0 0 5px;
  }
  form {
  padding: 25px;
  margin: 25px;
  box-shadow: 0 2px 5px #f5f5f5; 
  background: #eee; 
  }
  input, textarea {
  width: calc(100% - 18px);
  padding: 8px;
  margin-bottom: 20px;
  border: 1px solid #1c87c9;
  outline: none;
  }
  .contact-form button {
  width: 100%;
  padding: 10px;
  border: none;
  background: #1c87c9; 
  font-size: 16px;
  font-weight: 400;
  color: #fff;
  }
  button:hover {
  background: #2371a0;
  }    
  /* The Close Button */
  .close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  }
  .close:hover,
  .close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
  }
  button.button {
  background:none;
  border-top:none;
  outline: none;
  border-right:none;
  border-left:none;
  border-bottom:#02274a 1px solid;
  padding:0 0 3px 0;
  font-size:16px;
  cursor:pointer;
  }
  button.button:hover {
  border-bottom:#a99567 1px solid;
  color:#a99567;
  }
</style>

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

    {{-- Table of booking --}}
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">S.N.</th>
          <th scope="col">Company Name</th>
          <th scope="col">City</th>
          <th scope="col">Location</th>
          <th scope="col">Shift Time</th>
        </tr>
      </thead>

      <tbody>

        @foreach($items as $item)
        <tr>
          <th scope="row">{{$item['sn']}}</th>
          <td>{{$item['name']}}</td>
          <td>{{$item['city']}}</td>
          <td>{{$item['tole']}}</td>
          <td>{{$item['time']}}</td>
          <td><button type="button" data-modal="{{$item['sn']}}" class="button">Book</button></td>
        </tr>

        <div id="{{$item['sn']}}" class="modal">
          <div class="modal-content">
            <div class="contact-form">
              <form method="POST" action="book/{{$item['sn']}}" enctype="multipart/form-data">
              @csrf
                <h2>Fill this form to book</h2>
                <div>
                  <input type="text" name="phone" placeholder="Phone number">
                  <input type="date" name="date" placeholder="Date">
                  <input type="time" name="time" placeholder="Time">
                </div>
                <span>Message</span>
                <div>
                  <textarea name="message" rows="4"></textarea>
                </div>
                <button type="submit" href="/">Submit</button>
              </form>
            </div>
          </div>
        </div>
        @endforeach

      </tbody>
    </table>                   
</div>
    
    <!-- logout  -->
<section class="section-padding">
    <div class="container">
        <div class="row">
              <a href="{{url('logout')}}"><button class="btn primary_btn">Logout</button></a>   
        </div>
    </div>
</section>

    <script>
      var modalBtns = [...document.querySelectorAll(".button")];
      modalBtns.forEach(function(btn){
        btn.onclick = function() {
          var modal = btn.getAttribute('data-modal');
          document.getElementById(modal).style.display = "block";
        }
      });
      
      var closeBtns = [...document.querySelectorAll(".close")];
      closeBtns.forEach(function(btn){
        btn.onclick = function() {
          var modal = btn.closest('.modal');
          modal.style.display = "none";
        }
      });
      
      window.onclick = function(event) {
        if (event.target.className === "modal") {
          event.target.style.display = "none";
        }
      }
    </script>

@endsection
