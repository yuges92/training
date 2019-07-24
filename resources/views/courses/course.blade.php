@extends('layouts.app')
@section('content')
<div class="">
    <div class="jumbotron mb-0">
        <div class="container">
            <h1 class="display-3">{{$course->title}}</h1>
            <p>{{$course->description}}</p>
        </div>
    </div>

    @if ($course->courseBodies)
    <div class="  container ">

        @foreach ($course->courseBodies->sortBy('order') as $body)
        @if ($body)

        <div class=" my-2">
            <div class="card ">

                <div class="card-body">

                    <h2>{{$body->title}} </h2>
                    <p>{!!$body->content!!}</p>
                </div>
            </div>
        </div>
        @endif @endforeach
    </div>
    @endif

    @if (($course->documents) && $course->documents->count()>0)
    <div class="container ">
        <div class="card">
            <div class="card-body">

                <h2>Downdload Information </h2>
                @foreach ($course->documents as $document)
                <div class=" mx-auto">
                    <a target="_blank" href="{{$document->getDocUrl()}}" style="font-size:1.5rem;"><i
                            class="far fa-file-pdf"></i> {{$document->title}} </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <div class="container-fluid my-4">

        <div class="upcoming-courses mx-auto">
            <h2 class="mx-auto">Upcoming Courses</h2>
            <div class="row mx-auto">
                @foreach ($course->classes as $class)
                <div class="card m-2 " style="width: 19rem;">
                    <div class="card-header">
                        <h3 class="card-title">{{$course->title}}</h3>
                    </div>
                    <div class="card-body">
                        <p class=""> <strong>Start Date:</strong>
                            <span>{!!$class->getStartDate() !!} </span>
                        </p>
                        <p>
                           <strong> No of days: </strong>{{$class->classDates->count()}}
                            <small>day(s)</small>
                        </p>
                        <p>
                            <span><strong>Availability: </strong>{!!$class->getAvailableSpaceText()!!}</span>
                        </p>
                    </div>
                        <div class="mx-auto">
                            <span><strong class="price ">£{{$class->price}}</strong>(ex VAT)</span>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        {{-- <a href="{{route('addToBasket', $class->id)}}" class="btn btn-primary">Add to Basket</a>
                        --}}
                        <form method="POST" action="{{route('cart.store')}}">

                            {{ csrf_field() }}
                            <input type="hidden" name="class_id" value="{{$class->id}}">
                            <input type="hidden" name="quantity" value="1">
                            @if ($class->isFullyBooked())

                            <button type="submit"
                                class="btn btn-{{Cart::checkIfExist($class->id)?'success' : 'primary'}} add-to-cart "
                                {{Cart::checkIfExist($class->id)?'disabled' : ''}}>
                                <i class="fa fa-shopping-cart"></i>
                                {{Cart::checkIfExist($class->id)?'Added to cart' : 'Add to cart'}}

                            </button>
                            @endif
                        </form>
                        <a class="ml-1 btn btn-info"
                            href="{{route('showClassDetail', [$course->slug,$class->slug])}}">View Full
                            Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</div>
@endsection
