@extends('layouts.app')

@section('content')
  <section id="cart_items">
    <div class="container mt-5">

      <div class="table-responsive-sm cart_info">
        @if($cart && count($cart))
          <table class="table table-hover">
            <thead>
              <tr class="cart_menu table-success">
                <th></th>

                <th class="image">Course</th>
                {{-- <th class="location">Location</th> --}}
                {{-- <th class="date">Dates</th> --}}
                <th class="price">Price <small>(ex VAT)</small></th>
                <th class="quantity">Space</th>
                <th class="total">Total <small>(ex VAT)</small></th>
              </tr>
            </thead>
            <tbody>
              @foreach($cart as $item)
                <tr class="">
                  <td class="cart_delete">
                    <form class="" action="{{route('cart.destroy',$item->class_id)}}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="delete" />
                      <button type="submit" class="cart_quantity_delete text-danger btn " name="destroy">Remove</button>
                    </form>
                  </td>
                  <td class="cart_description">
                    <h2><a href="{{route('showClassDetail', [$item->class->course->slug,$item->class->slug])}}">{{$item->class->course->title}}</a></h2>
                    <div class="row">
                      <div class="col-12">

                        <span>{{$item->class->address->town}}</span>
                      </div>
                      <div class="col-12">

                        <span>{{$item->class->getStartEndDate()}}</span>
                      </div>
                    </div>
                  </td>
                  {{-- <td>{{$item->class->address->town}}</td> --}}
                  {{-- <td>{{$item->class->getStartEndDate()}}</td> --}}
                  <td class="cart_price">
                    <p>£{{$item->class->price}}</p>
                  </td>
                  <td class="cart_quantity">
                    <form class="row" action="{{route('cart.update', $item->class_id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      <input type="hidden" name="class_id" value="{{$item->class_id}}">
                      <div class="">
                      </div>

                      @if ($item->class->type=='private')
                        <input id="quantity{{$item->class_id}}" autocomplete="off" size="2" value="{{$item->class->availableSpace}}" title="quantity" class="form-control col-md-5 text-center" readonly>
                      @else
                        <div class="form-inline row mx-auto">
                          <label for="quantity{{$item->class_id}}" class="sr-only">Quantity</label>
                          <button class="col-xs-4 qty-decrement-cart btn btn-link" type="button" data-id="quantity{{$item->class_id}}"><i class="fas fa-minus"></i></button>
                          <input id="quantity{{$item->class_id}}" name="quantity" type="number" autocomplete="off" size="2" value="{{$item->quantity}}" title="quantity" class="form-control  col-5 col-md-4 quantity-input text-center" min="1" max="{{$item->class->availableSpace}}" button-target="button{{$item->class_id}}">
                          <button class="col-xs-4 qty-increment-cart btn btn-link" type="button" data-id="quantity{{$item->class_id}}"><i class="fas fa-plus"></i></button>
                          <div class="d-flex justify-content-center mt-1 ">
                            <button id="button{{$item->class_id}}"class="btn ml-1 btn-info" type="submit" name="button" disabled>Update</button>
                          </div>
                        </div>
                      @endif

                    </form>
                  </td>
                  <td class="cart_total">
                    <strong class="cart_total_price">£{{$item->getItemSubTotal()}}</strong>
                  </td>
                </tr>
              @endforeach
            </tbody>

          </table>
          <div class="">
            <div class="col-12">
              <form class="form-inline" action="/" method="post">
                {{ csrf_field() }}
                <div class="form-group mx-sm-3 mb-2">
                  <label for="promotionalCode" class="sr-only">Promotional Code</label>
                  <input name="promotionalCode" type="text" class="form-control" id="promotionalCode" placeholder="Promotional Code">
                </div>
                <button type="submit" class="btn btn-info mb-2">Apply Promotional Code</button>
              </form>


            </div>
          </div>
          <div class="my-3">
            <a href="/courses" class="btn btn-primary">Add another course</a>
          </div>
          <div class="bg-dark container basket-total-container text-white">
            <h2>Basket Totals</h2>
            <div class="">
              <div class="col-12">
                <span class="total">Sub Total</span> <span>£{{Cart::subtotal()}} <small>ex VAT</small></span>

              </div>
              <div class="col-12">
                <span class="total">VAT</span> <span>£{{Cart::getVAT()}}</span>

              </div>
              <div class="col-12">

                <span class="total">Total</span> <span>£{{Cart::total()}} <small>inc VAT</small></span>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end mt-3">
            <a class="btn btn-success px-5 py-3" href="{{route('whoIsItFor')}}">Continue to Checkout</a>
          </div>
        @else
          <p class="text-center">You have no items in the shopping cart</p>
        @endif

      </div>
    </div>
  </section> <!--/#cart_items-->
@endsection
