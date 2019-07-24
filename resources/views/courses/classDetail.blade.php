@extends('layouts.app')

@section('content')
<div class="class-page-header">

    <div class="container">
        <h1>{{$class->course->title}} <small>{{$class->getStartDate()}}</small></h1>
        <p class="description">{{$class->description}}</p>
    </div>
</div>
<div class="container mt-3">
    <div class="class-detail">
        <div class="price">
            <h2>£{{$class->price}} <small>ex VAT</small></h2>
        </div>
        <div class="">
            <p class="stock in-stock">{!!ucfirst($class->getAvailableSpaceText())!!}.</p>
        </div>

        <div class="row mx-auto">

            <div class="col-md-6">
                <iframe src="https://www.google.com/maps?q=<?= $class->address->postcode ?>&output=embed" width="100%"
                    height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-6">
                <ul>
                    <li>
                        <span>Location:</span>
                        {{$class->address->getFullAddress()}}
                    </li>
                    <li>
                        <span>Dates:</span>
                        @if ($class->classDates)
                        @foreach ($class->classDates as $date)
                        <ul>
                            <li>

                                <strong>Day {{$date->day}}: </strong>
                                <span>{{$date->getFormattedDate()}}</span>
                                <div>
                                    <span> Start Time:</span>
                                    <span>{{$date->startTime}}</span>
                                </div>

                                <div>
                                    <span> End Time:</span>
                                    <span>{{$date->endTime}}</span>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                        @endif
                    </li>
                    <li>
                        <strong>Available Space:</strong>
                        <span> {!!ucfirst($class->getAvailableSpaceText())!!}</span>
                    </li>
                </ul>
                @if ($class->availableSpace>0)

                <form class="" action="{{($cartItem) ? route('cart.update', $cartItem->class_id):route('cart.store')}}"
                    method="post">
                    @if ($cartItem)
                    {{ method_field('PUT') }}
                    @endif
                    {{ csrf_field() }}
                    <input type="hidden" name="class_id" value="{{$class->id}}">
                    <div class="">
                    </div>
                    <div class="form-inline">
                        <label for="quantity{{$class->id}}" class="sr-only">Quantity</label>
                        <button class="col-xs-4 qty-decrement-cart btn btn-link" type="button"
                            data-id="quantity{{$class->id}}"><i class="fas fa-minus"></i></button>
                        <input id="quantity{{$class->id}}" name="quantity" type="number" autocomplete="off" size="2"
                            value="{{($cartItem) ?$cartItem->quantity :1}}" title="quantity"
                            class="form-control quantity-input text-center col-xs-5 col-md-1 " min="1"
                            max="{{$class->availableSpace}}">
                        <button class="col-xs-4 qty-increment-cart btn btn-link" type="button"
                            data-id="quantity{{$class->id}}"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class=" mt-3">
                        <button class="btn btn-{{($cartItem) ?'success' :'primary'}} add-to-cart" type="submit"
                            name="button">
                            <i class="fa fa-shopping-cart"></i>
                            {{($cartItem) ?'Update Cart' :'Add To Cart'}}
                        </button>
                    </div>
                </form>
                @endif

            </div>
        </div>

    </div>

    <div class="other-related-courses mt-5">
        <h2>Other courses you might be interested</h2>
        <div class="row mx-auto">
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title">title</h3>
                    <p class="card-text"></p>
                </div>

                <div class="card-footer row mx-auto">
                    {{-- <a href="{{route('addToBasket', $class->id)}}" class="btn btn-primary">Add to Basket</a> --}}
                    <form method="POST" action="{{route('cart.store')}}">

                        {{ csrf_field() }}
                        <input type="hidden" name="class_id" value="22">
                        <button type="submit" class="btn btn-primary add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    </form>
                    <a class="ml-1 btn btn-info"
                        href="{{route('showClassDetail', [$class->course->slug,$class->slug])}}">View Full Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
