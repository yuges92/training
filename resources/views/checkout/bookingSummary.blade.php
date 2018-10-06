<div class="booking-summary col">
  <div class=" container basket-total-container ">
    <h2>Booking Summary</h2>
    <div class="col-12">
      @foreach ($cart as $cartItem)
        <div class="course-details ">
          <h3>{{$cartItem->name}}</h3>
          <span class=" float-right my-auto">x {{($cartItem->model->type=='private')?$cartItem->model->availableSpace :$cartItem->qty}}</span>
          <div class="course-body">
            <span>{{$cartItem->model->address->town}}</span>,
            <span>{{$cartItem->model->getStartEndDate()}}</span>
          </div>
        </div>
      @endforeach
    </div>
    <div class="mt-5">
      <div class="col-12">
        <span class="total">Sub Total</span> <span>£{{Cart::subtotal()}} <small>ex VAT</small></span>

      </div>
      <div class="col-12">
        <span class="total">VAT</span> <span>£{{Cart::tax()}}</span>

      </div>
      <div class="col-12">

        <span class="total">Total</span> <span>£{{Cart::total()}} <small>inc VAT</small></span>
      </div>
    </div>
  </div>
</div>
