@extends('layouts.adminLayout')

@section('content')
  <h1>Courses</h1>
  <div class="my-2">
    <a class="btn btn-info" href="{{route('createCourse')}}">Create New</a>
  </div>
  @if (count($bookings)>0)
  <table class="table table-hover table-responsive-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($bookings as $booking)

        <tr>
          <th scope="row">{{$booking->id}}</th>
          <td>{{$booking->title}}</td>
          <td class="row"><a class="btn btn-success mr-1" href="{{route('editCourse', [$booking->id])}}">Edit</a>
            <form class="deleteForm" action="{{route('deleteCourse',[$booking->id])}}" method="post">
              {{ csrf_field() }}
              @method('Delete')
              <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  @else
    <div class="text-center">

      <span class="text-danger">No bookings found!</span>
    </div>
  @endif

  @endsection
