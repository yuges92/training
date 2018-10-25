@extends('layouts.app')

@section('content')
  <section id="cart_items">
    <div class="container mt-5">
      <h1>Already have an account?</h1>
      <div class="row mx-auto mt-5">
        <div class="col-md-8">
          <h2 class="">Sign in</h2>
          <div class="col-md-6 my-auto">
            <div class="">
              <div class=" ">
                <form method="POST" action="{{ route('customLogin') }}">
                  {{-- <input type="hidden" name="redirectLink" value="{{}}"> --}}
                  @csrf
                  <div class=" ">

                    <div class="col-12 p-2">
                      <label for="email" class="sr-only ">{{ __('E-Mail Address') }}</label>

                      <div class="col-12">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

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
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                        @if ($errors->has('password'))
                          <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                  </div>

                  <div class="">
                    <div class="col-12 p-2 row">
                      <div class="checkbox mx-auto">
                        <label>
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <button type="submit" class="btn btn-primary col-8 mx-auto">
                      {{ __('Login') }}
                    </button>
                  </div>

                  <div class="form-group row ">
                    <a class="btn btn-link mx-auto" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <a href="{{Request::url()}}/create" class=" my-1 mx-auto btn btn-outline-info whoIsItFor">New user</a>
      </div>
    </div>
  </section> <!--/#cart_items-->
@endsection
