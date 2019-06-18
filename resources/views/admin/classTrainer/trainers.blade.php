@extends('layouts.adminLayout')

@section('content')
  <h1>Classes/Events</h1>
  <div class="my-2">
    <a class="btn btn-info" href="{{route('classTrainer.create')}}">Add New</a>

  </div>
  @if (count($classes)>0)
    <table class="table table-hover table-responsive-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Course</th>
          <th scope="col">Class</th>
          <th scope="col">Trainer</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($classes as $class)

          <tr>
            <th scope="row">{{$class->id}}</th>
            <td>{{'(#'.$class->course->id.') '.$class->course->title}}</td>
            <td></td>
            <td>
              @foreach ($class->trainers as $trainer)
                {{$trainer->getFullname().', '}}
              @endforeach
            </td>
            <td><a class="btn btn-success mr-1" href="{{route('classTrainer.edit', $class->id)}}">Edit</a></td>
          </tr>
        @endforeach

      </tbody>
    </table>
  @else
    <div class="text-center">

      <span class="text-danger">No courses found!</span>
    </div>
  @endif

@endsection
