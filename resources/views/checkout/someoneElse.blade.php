@extends('layouts.app')

@section('content')
  <section id="cart_items">
    <div class="container mt-5">
      <h1>Your Details</h1>

      <form class="" action="{{route('paymentAndBilling')}}" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-7">
            {{ csrf_field() }}

            <div class="form-group row">
              <label for="firstName" class="col-md-3 col-form-label">First name:</label>
              <div class="col">
                <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
              </div>
            </div>

            <div class="form-group row">
              <label for="lastName" class="col-md-3 col-form-label">Last name:</label>
              <div class="col">
                <input name="lastName" type="text" class="form-control" id="lastName" value="{{ old('lastName') }}" placeholder="Last name">
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-3 col-form-label">Email:</label>
              <div class="col">
                <input name="email" type="text" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email">
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-3 col-form-label">Password:</label>
              <div class="col">
                <input class="form-control" type="password" name="password" id="password" value="" placeholder="Password">
              </div>
            </div>

            <div class="form-group row">
              <label for="confirmPassword" class="col-md-3 col-form-label">Confirm Password:</label>
              <div class="col">
                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" value="" placeholder="Confirm Password">
              </div>
            </div>


            <div class="form-group row">
              <label for="phone" class="col-md-3 col-form-label">Phone:</label>
              <div class="col">
                <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone')}}" placeholder="Phone">
              </div>
            </div>


            <div class="form-group row">
              <label for="organisation" class="col-md-3 col-form-label">Organisation:</label>
              <div class="col">
                <input name="organisation" type="text" class="form-control" id="organisation" value="{{ old('organisation')}}" placeholder="Organisation" >
              </div>
            </div>
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
