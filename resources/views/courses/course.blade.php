@extends('layouts.app')

@section('content')
  <div class="">
    <div class="bg-dark">
      <h1>{{$course->title}}</h1>
    </div>
    <div class="">
      {!!$course->body !!}
    </div>

    <div class="upcoming-courses ">
      <h2>Upcoming Courses</h2>
      <div class="row mx-auto">
        @foreach ($course->classes as $class)
          <div class="card m-2" style="width: 19rem;">
            <div class="card-body">
              <h3 class="card-title">{{$course->title}}</h3>
              <p class="card-text">  {!!$class->getStartEndDate() !!}</p>
              <p>
                <span><strong>{{$class->availableSpace}}</strong> space(s) remaining</span>
              </p>
            </div>
            <div class="px-5">
              <span><strong class="price">£{{$class->price}}</strong>(ex VAT)</span>
            </div>
            <div class="card-footer row mx-auto">
              {{-- <a href="{{route('addToBasket', $class->id)}}" class="btn btn-primary">Add to Basket</a> --}}
              <form method="POST" action="{{route('cart.store')}}">

                {{ csrf_field() }}
                <input type="hidden" name="class_id" value="{{$class->id}}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-{{Cart::checkIfExist($class->id)?'success' : 'primary'}} add-to-cart" {{Cart::checkIfExist($class->id)?'disabled' : ''}}>
                  <i class="fa fa-shopping-cart"></i>
                  {{Cart::checkIfExist($class->id)?'Added to cart' : 'Add to cart'}}

                </button>
              </form>
              <a class="ml-1 btn btn-info"href="{{route('showClassDetail', $class->id)}}">View Full Detail</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
