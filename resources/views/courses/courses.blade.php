@extends('layouts.app')
@section('content')
<div class="container mt-4">
  <div class=" d-flex justify-content-center row mx-auto ">
    <div class="col-12 text-center">
      <h1>Available Courses</h1>

    </div>
    @foreach ($courses as $course)
@if ($course->isPublic())

    <div class="card m-2" style="width: 18rem; ">
      <img style="height: 13rem;" class="card-img-top" src="{{$course->getImage()}}"
        alt="Card image cap">
      <div class="card-body">
        <div class="card-title">
          <h2>{{$course->title}}</h2>
        </div>
        <div class="card-text">
          <p>
            {{ str_limit($course->description, $limit = 150, $end = '...') }}<a href=""> find more</a>
          </p>
        </div>

      </div>
      <div class="card-footer">

        <a href="{{route('course', [$course->courseType->slug,$course->slug])}}" class="btn btn-info col-12">Full Info</a>
      </div>
    </div>
    @endif

    @endforeach


  </div>
</div>
@endsection
