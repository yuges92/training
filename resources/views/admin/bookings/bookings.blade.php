@extends('layouts.adminLayout')

@section('content')
  <h1>Courses</h1>
  <div class="my-2">
    <a class="btn btn-info" href="{{route('createCourse')}}">Create New</a>
  </div>
  @if (count($orders)>0)
    <div class="box">
      <div class="box-header mb-4">
        <div class="box-tools">
          <div class="input-group input-group-sm" >
            <input type="text" name="table_search" class="form-control pull-md-right search-input" placeholder="Search">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="box-body no-padding">

      <table class="table table-hover table-responsive-md table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Booked by</th>
            <th scope="col">Date</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Type</th>
            <th scope="col">Status</th>
            <th scope="col">Total</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)

            <tr>
              <th scope="row">{{$order->id}}</th>
              <td>{{$order->user ? $order->user->getFullname():''}}</td>
              <td>{{$order->created_at}}</td>
              <td>{{$order->paymentMethod}}</td>
              <td>{{$order->type()}}</td>
              <td>{{$order->status}}</td>
              <td>£{{$order->total}}</td>
              <td class="row"><a class="btn btn-success mr-1" href="{{route('order.edit', [$order->id])}}">Edit</a>
                <form class="deleteForm" action="{{route('deleteCourse',[$order->id])}}" method="post">
                  {{ csrf_field() }}
                  @method('Delete')
                  <input class="btn btn-danger" type="submit" value="Delete">
                </form>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    </div>

  @else
    <div class="text-center">

      <span class="text-danger">No bookings found!</span>
    </div>
  @endif

@endsection
