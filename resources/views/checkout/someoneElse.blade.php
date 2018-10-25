@extends('layouts.app')

@section('content')
  <section id="cart_items">
    <div class="container mt-5">
      <h1>Your Details</h1>

      <form class="" action="{{route('someoneElse.store')}}" method="post">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-7">
            @include('partials.userDetail')

          </div>
          @include('checkout.bookingSummary')

        </div>

        <div class="form-group  mt-3 p-3 d-flex justify-content-end">
          <input class="btn btn-primary px-5 py-3" type="submit" value="Continue to checkout">
        </div>
      </form>


    </div>
  </section> <!--/#cart_items-->
@endsection
