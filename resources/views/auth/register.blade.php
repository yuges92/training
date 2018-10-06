@extends('layouts.noNav')

@section('body')
  <header class=" p-5 m-0">
    <div class="row ">
      <a class="brand mx-auto" href="/">
        <h1 class="text-center">
          {{ config('app.name', 'Laravel') }}
        </h1>
      </a>
    </div>
  </header>

  <div class="container p-0 mb-5">
    <div class=" d-flex justify-content-center">
      <div class="col-md-8">

        <div class="card">
          <div class="card-header">
            <h2 class="text-center">Register</h2>
          </div>
          <div class="col-12 p-0">
            <ul class="tab-nav">
              <li class="active">Account Details</li>
              <li class="">Personal Details</li>
              <li class="">Additional Details</li>
            </ul>
          </div>

          <div class="card-body p-0">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <ul class="register-tabs p-3">

                <li class="col-12 active" id="account-details">
                  <div role="tabpanel" class="tab-pane ">

                    <div class="col-12 p-2">
                      <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>

                      <div class="col-12">
                        <input placeholder="Email Address" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="col-12 p-2">
                      <label for="password" class="sr-only">{{ __('Password') }}</label>

                      <div class="col-12">
                        <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="col-12 p-2">
                      <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>

                      <div class="col-12">
                        <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                      </div>
                    </div>
                    <div class="col-12 p-2 mb-0">
                      <div class="col-12 d-flex justify-content-center">
                        <button type="button" class="px-5 btn btn-primary btn-next" >
                          {{ __('Next') }}
                        </button>
                      </div>
                    </div>

                  </div>


                </li>
                <li class="col-12 hidden" >
                  <div role="tabpanel" class="tab-pane fade in active show " id="personal-details">

                    <div class="col-12 p-2">
                      <label for="firstname" class="sr-only">{{ __('Firstname') }}</label>
                      <div class="col-12">
                        <input id="firstname" type="text" placeholder="Firstname" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                        @if ($errors->has('firstname'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('firstname') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="col-12 p-2">
                      <label for="lastname" class="sr-only">{{ __('Lastname') }}</label>
                      <div class="col-12">
                        <input id="lastname" type="text" placeholder="lastname" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                        @if ($errors->has('lastname'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('lastname') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="col-12 p-2 mb-0 ">
                      <div class="col-12 d-flex justify-content-center row">
                        <button type="button" class="px-5 btn btn-secondary m-1 btn-prev" >
                          {{ __('Previous') }}
                        </button>
                        <button type="button" class="px-5 btn btn-primary m-1 btn-next" >
                          {{ __('Next') }}
                        </button>
                      </div>
                    </div>


                  </div>

                </li>
                <li class="col-12 hidden">
                  <div class="col-12 p-2 mb-0">
                    <div class="col-12 row">


                      <div class="col-12 p-2 mb-0 ">
                        <div class="col-12 d-flex justify-content-center row">
                          <button type="button" class="px-5 btn btn-secondary m-1 btn-prev">
                            {{ __('Previous') }}
                          </button>
                          <button type="submit" class="px-5 btn btn-primary m-1">
                            {{ __('Register') }}
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
