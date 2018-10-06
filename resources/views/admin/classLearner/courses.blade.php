@extends('layouts.adminLayout')

@section('content')
  <h1>Courses</h1>

  @if (count($courses)>0)
  {{-- <table class="table table-hover table-sm-responsive">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Course</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($classes as $class)

        <tr>
          <th scope="row">{{$class->id}}</th>
          <td>{{'(#'.$class->course->id.') '.$class->course->title}}</td>
          <td>{{$class->getFormattedStartDate()}}</td>
          <td>{{$class->endDate->format('j F Y')}}</td>
          <td class="row"><a class="btn btn-success mr-1" href="{{route('classEvent.edit', $class->id)}}">Edit</a>
            <form class="deleteForm" action="{{route('classEvent.destroy',[$class->id])}}" method="post">
              {{ csrf_field() }}
              @method('Delete')
              <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          </td>
          </tr>
        @endforeach

      </tbody>
    </table> --}}

    @foreach ($courses as $course)

    <a href="/admin/attendance/{{$course->id}}" class="custom-card" >
      <div class="card">
        <div class="card-body">
          <h2 class="card-title text-center">{{$course->title}}</h2>
        </div>
      </div>
    </a>
  @endforeach

    {{-- <a class="btn btn-success mr-1" href="{{route('classEvent.edit', $class->id)}}">Edit</a> --}}
  @else
    <div class="text-center">

      <span class="text-danger">No courses found!</span>
    </div>
  @endif

  @endsection
