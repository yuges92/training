@extends('layouts.app')

@section('content')
  <section id="cart_items">
    <div class="container mt-5">
      <h1>Who is the course(s) for?</h1>

      <div class="row mx-auto mt-5">
        <a href="{{route('self.index')}}" class=" my-1 mx-auto btn btn-outline-info whoIsItFor d-flex row justify-content-center"><strong>Buying for you</strong>
            <small>Choose this option if the place(s) you are purchasing are for you and you alone</small>
        </a>
        <a href="{{route('someoneElse.index')}}" class=" my-1 mx-auto btn btn-outline-info whoIsItFor d-flex row justify-content-center"><strong>Someone else</strong>
            <small>Choose this option if the place(s) you are purchasing includes a learner other than yourself</small>
        </a>
      </div>
    </div>
  </section> <!--/#cart_items-->
@endsection
