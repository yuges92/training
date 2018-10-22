@extends('layouts.app')

@section('content')
  <section id="cart_items">
    <div class="container mt-5">
      <h1>Who is the course(s) for?</h1>

      <div class="row mx-auto mt-5">
        <a href="{{route('self.index')}}" class=" my-1 mx-auto btn btn-outline-info whoIsItFor">You</a>
        <a href="{{route('someoneElse.index')}}" class=" my-1 mx-auto btn btn-outline-info whoIsItFor">Someone else</a>
      </div>
    </div>
  </section> <!--/#cart_items-->
@endsection
