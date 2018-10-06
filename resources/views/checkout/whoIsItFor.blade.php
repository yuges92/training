@extends('layouts.app')

@section('content')
  <section id="cart_items">
    <div class="container mt-5">
      <h1>Who is the course(s) for?</h1>

      <div class="row mx-auto mt-5">
        <a href="{{route('buyForSelf')}}" class=" my-1 mx-auto btn btn-outline-info whoIsItFor">You</a>

        <a href="{{route('buyForSomeoneElse')}}" class=" my-1 mx-auto btn btn-outline-info whoIsItFor">Someone Else</a>


        <a href="{{route('buyForSomeoneElse')}}" class=" my-1 mx-auto btn btn-outline-info whoIsItFor">Commissioner</a>
      </div>
    </div>
  </section> <!--/#cart_items-->
@endsection
