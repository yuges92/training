@extends('layouts.learner')

@section('content')
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
                <td>{{$order->created_at}}</td>
                <td>{{$order->paymentMethod}}</td>
                <td>{{$order->type()}}</td>
                <td class=""><span class="label label-danger">{{$order->status}}</span></td>
                <td>£{{$order->total}}</td>
                <td class=""><a class="btn btn-success " href="{{route('learner.bookings.show', [$order->id])}}">View</a></td>
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
