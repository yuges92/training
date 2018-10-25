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
        <th scope="col">Booked by</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col">Total</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($bookings as $booking)

        <tr>
          <th scope="row">{{$booking->id}}</th>
          <td>{{$booking->user->getFullname()}}</td>
          <td>{{$booking->created_at}}</td>
          <td>{{$booking->status}}</td>
          <td>£{{$booking->total}}</td>
          <td class="row"><a class="btn btn-success mr-1" href="{{route('bookings.edit', [$booking->id])}}">Edit</a>
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
