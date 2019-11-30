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

    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">S.N.</th>
          <th scope="col">C.ID</th>
          <th scope="col">Phone</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Message</th>
        </tr>
      </thead>

      <tbody>

        @foreach($query_item as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->cuid}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->date}}</td>
            <td>{{$item->time}}</td>
            <td>{{$item->message}}</td>
            <td><a href='/arena/delete/{{$item->id}}'<button type="button" class="button">Delete</button></a></td>
        </tr>

        @endforeach

      </tbody>
    </table>                   
       
     </section>
   </section>

@endsection
