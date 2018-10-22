

@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class=" d-flex justify-content-center row mx-auto ">
  <div class="col-12 text-center">
    <h1>Available Courses</h1>

  </div>
@foreach ($courses as $course)

      <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top h-50" src="//images.pexels.com/photos/256541/pexels-photo-256541.jpeg?cs=srgb&dl=bookcase-books-bookshelves-256541.jpg&fm=jpg" alt="Card image cap">
        <div class="card-body">
          <div class="card-title">
            <h2>{{$course->title}}</h2>
          </div>
          <div class="card-text">
            <p>{{$course->description}}</p>
          </div>

        </div>
        <div class="card-footer">

          <a href="{{route('course', [$course->id])}}" class="btn btn-info col-12">Full Info</a>
        </div>
      </div>

    @endforeach


  </div>
</div>
@endsection
