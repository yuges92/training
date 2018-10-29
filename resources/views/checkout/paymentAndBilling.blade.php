@extends('layouts.app')

@section('content')
  <section id="cart_items">
    <div class="container mt-5">
      <h1>Billing Details</h1>

      <form class="" action="" method="post">
        {{ csrf_field() }}

        <div class="row">
          <div class="col-md-7">
            <div class="default-billing-address">
              <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <button class="btn checkBoxBtn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" type="button">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="differentAddress" id="sameBilling" value="0" required="" {{old('differentAddress')!=1 ?'checked' :''}}>
                        <label class="form-check-label" for="sameBilling">Billing detail</label>
                      </div>
                    </button>
                  </div>

                  <div id="collapseOne" class="collapse {{old('differentAddress')!=1 ?'show' :''}}" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      @if ($userAddress)
                        <address class="">
                          {{$userAddress->line1}}<br>
                          {{$userAddress->town}}<br>
                          {{$userAddress->county}}<br>
                          {{$userAddress->postcode}}<br>
                          {{$userAddress->country}}<br>
                        </address>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <button class="btn checkBoxBtn" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" type="button">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="differentAddress" id="billingAddress" value="1" required="" {{old('differentAddress')==1 ?'checked' :''}}>
                        <label class="form-check-label" for="billingAddress">Different billing detail</label>
                      </div>
                    </button>
                  </div>
                  <div id="collapseTwo" class="collapse {{old('differentAddress')==1 ?'show' :''}}" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">

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

                        <div class="check-box-group-gdpr" >
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input " id="saveDeault" name="saveDeault" value="1" {{old('saveDeault')?'checked':''}}>
                            <label class="form-check-label" for="saveDeault">Save this as default billing address</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>



          </div>

          @include('checkout.bookingSummary')
        </div>
        <div class="referrer-div">

          <div class="referrer my-3">
            <div class="col-12">
              <div class=" form-group  row">
                <label for="referralCode" class="my-auto col-md-3">Where did you hear about us:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control rounded" id="referralCode" placeholder="Referral Code" name="referralCode" value="{{old('referralCode')}}">
                </div>
              </div>
            </div>
          </div>

          {{-- <div class="gdpr-consent">
          <div class="col-12 mb-2">
          <div class="card">
          <div class="card-body">
          <h5>Sign up to DLF Training News</h5>
          <div class="">
          <label for="yesCheck" class="">Do you wish to receive information on future DLF training and learning events?</label>
          <div class="col-12 p-0">

          <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="signUpForNews" id="yesCheck" value="Yes" required="" {{old('signUpForNews')=='Yes'?'checked':''}}>
          <label class="form-check-label" for="yesCheck">Yes</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="signUpForNews" id="NoCheck" value="No" required="" {{old('signUpForNews')=='No'?'checked':''}}>
        <label class="form-check-label" for="NoCheck">No</label>
      </div>
    </div>
  </div>
  <div class="check-box-group-gdpr" >
  <label for="" class="">If yes, Please tell us how we can contact you.</label>
  <div class="form-check">
  <input type="checkbox" class="form-check-input " id="gdprEmail" name="contacts[]" value="email" {{old('signUpForNews')=='Yes' && old('contacts.0')=='email'?'checked':''}}>
  <label class="form-check-label" for="gdprEmail">Email</label>
</div>
<div class="form-check">
<input type="checkbox" class="form-check-input" id="gdprPhone" name="contacts[]" value="phone" {{old('signUpForNews')=='Yes' && old('contacts.1')=='phone'?'checked':''}}>
<label class="form-check-label" for="gdprPhone">Phone</label>
</div>
</div>

</div>
</div>
</div>
</div> --}}

</div>

<div class="payment-types">
  <h2>Payment Method</h2>
  <div class="invoice-request">
    <h3>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="paymentMethod" id="invoiceRequest" value="invoiceRequest" required="" {{old('paymentMethod')=='invoiceRequest'? 'checked':''}}>
        <label class="form-check-label" for="invoiceRequest">Invoice Request</label>
      </div>
    </h3>
    <div class="poCode" >
      <p>Please provide the code below</p>
      <div class=" form-group  row">
        <label for="poCode" class="my-auto col-md-3">Purchase Order Number:</label>
        <div class="col-md-4">
          <input type="text" class="form-control rounded" id="poCode" placeholder="Purchase Order Number" name="poNumber" value="{{old('poNumber')}}">
        </div>
      </div>
    </div>
  </div>
  <div class="paypal-payment">
    <h3>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal" required="" {{old('paymentMethod')=='paypal'? 'checked':''}}>
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
  <button style="{{old('paymentMethod')=='paypal'? '':'display:none;'}}" class="paypal-btn btn"type="submit" name="paypalBtn"><i class="fab fa-paypal"></i> Pay with PayPal</button>
</div>
</form>


</div>
</section> <!--/#cart_items-->
@endsection
