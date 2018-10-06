@extends('layouts.app')

@section('content')
  <section id="cart_items">
    <div class="container mt-5">
      <h1>Billing Details</h1>

      <form class="" action="" method="post">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-7">
            <div class="billing-address">
              <div class="form-group row">
                <label for="billingFirstName" class="col-md-3 col-form-label">First name:</label>
                <div class="col">
                  <input name="billingFirstName" type="text" class="form-control" id="billingFirstName" value="{{ old('billingFirstName') }}" placeholder="First name">
                </div>
              </div>

              <div class="form-group row">
                <label for="billingLastName" class="col-md-3 col-form-label">Last name:</label>
                <div class="col">
                  <input name="billingLastName" type="text" class="form-control" id="billingLastName" value="{{ old('billingLastName') }}" placeholder="Last name">
                </div>
              </div>

              <div class="form-group row">
                <label for="billingTel" class="col-md-3 col-form-label">Telephone:</label>
                <div class="col">
                  <input class="form-control" type="text" name="billingTel" id="billingTel" value="{{old('billingTel')}}" placeholder="Telephone">
                </div>
              </div>

              <div class="form-group row">
                <label for="billingLine1" class="col-md-3 col-form-label">Line 1:</label>
                <div class="col">
                  <input class="form-control" type="text" name="billingLine1" id="billingLine1" value="{{old('billingLine1')}}" placeholder="Billing address line 1">
                </div>
              </div>

              <div class="form-group row">
                <label for="billingLine2" class="col-md-3 col-form-label">Line 2:</label>
                <div class="col">
                  <input class="form-control" type="text" name="billingLine2" id="billingLine2" value="{{old('billingLine2')}}" placeholder="Billing address line 2">
                </div>
              </div>

              <div class="form-group row">
                <label for="billingTown" class="col-md-3 col-form-label">Town:</label>
                <div class="col">
                  <input class="form-control" type="text" name="billingTown" id="billingTown" value="{{old('billingTown')}}" placeholder="Billing address town">
                </div>
              </div>

              <div class="form-group row">
                <label for="billingCounty" class="col-md-3 col-form-label">County:</label>
                <div class="col">
                  <input class="form-control" type="text" name="billingCounty" id="billingCounty" value="{{old('billingCounty')}}" placeholder="County ">
                </div>
              </div>

              <div class="form-group row">
                <label for="billingPostcode" class="col-md-3 col-form-label">Postcode:</label>
                <div class="col">
                  <input class="form-control" type="text" name="billingPostcode" id="billingPostcode" value="{{old('billingPostcode')}}" placeholder="Postcode">
                </div>
              </div>

              <div class="form-group row">
                <label for="billingCountry" class="col-md-3 col-form-label">Country:</label>
                <div class="col">
                  <input class="form-control" type="text" name="billingCountry" id="billingCountry" value="{{old('billingCountry')}}" placeholder="Country">
                </div>
              </div>
            </div>

          </div>

          @include('checkout.bookingSummary')
        </div>
        <div class="referrer-gdpr-div">

        <div class="referrer my-3">
          <div class="col-12">
            <div class=" form-group  row">
              <label for="referralCode" class="my-auto col-md-3">Where did you hear about us:</label>
              <div class="col-md-4">
                <input type="text" class="form-control rounded" id="referralCode" placeholder="Referral Code" name="referralCode">
              </div>
            </div>
          </div>
        </div>

        <div class="gdpr-consent">
          <div class="col-12 mb-2">
            <div class="card">
              <div class="card-body">
                <h5>Sign up to DLF Training News</h5>
                <div class="">
                  <label for="yesCheck" class="">Do you wish to receive information on future DLF training and learning events?</label>
                  <div class="col-12 p-0">

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="signUpForNews" id="yesCheck" value="Yes" required="">
                    <label class="form-check-label" for="yesCheck">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="signUpForNews" id="NoCheck" value="No" required="">
                    <label class="form-check-label" for="NoCheck">No</label>
                  </div>
                </div>
                </div>
                <div class="check-box-group-gdpr" style="display:none;">

                  <label for="" class="">If yes, Please tell us how we can contact you.</label>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input " id="gdprEmail" name="contacts[]" value="email">
                    <label class="form-check-label" for="gdprEmail">Email</label>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="gdprPhone" name="contacts[]" value="phone">
                    <label class="form-check-label" for="gdprPhone">Phone</label>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="payment-types">
          <h2>Payment Method</h2>
          <div class="invoice-request">
            <h3>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="paymentMethod" id="invoiceRequest" value="invoiceRequest" required="" checked>
                <label class="form-check-label" for="invoiceRequest">Invoice Request</label>
              </div>
            </h3>
            <div class="poCode" >
              <p>Please provide the code below</p>
              <div class=" form-group  row">
                <label for="poCode" class="my-auto col-md-3">Purchase Order Number:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control rounded" id="poCode" placeholder="Purchase Order Number" name="referralCode">
                </div>
              </div>
            </div>
          </div>
          <div class="paypal-payment">
            <h3>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal" required="">
                <label class="form-check-label" for="paypal">Paypal</label>
              </div>
            </h3>
          </div>
        </div>




        <div class="d-flex justify-content-end">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="termsCondition" name="termsCondition" value="1">
            <label class="form-check-label" for="termsCondition">I have read and agree to the website privacy policy and <a href="" class="btn-link" target="_blank">terms and conditions</a>.</label>
          </div>
        </div>
        <div class="form-group  mt-3 d-flex justify-content-md-end justify-content-center">
          <button class="place-booking-btn btn btn-primary"type="submit" name="placeBookingBtn"> Place Booking(s)</button>

          {{-- <button class="paypal-btn"type="button" name="button"><i class="fab fa-cc-paypal"></i></button> --}}
          <button style="display:none;" class="paypal-btn btn"type="submit" name="paypalBtn"><i class="fab fa-paypal"></i> Pay with PayPal</button>
        </div>
      </form>


    </div>
  </section> <!--/#cart_items-->
@endsection
