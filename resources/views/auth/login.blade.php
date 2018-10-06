@extends('layouts.noNav')

@section('body')
  <header class="p-5">
    <div class="row mx-auto">
      <a class="brand mx-auto" href="/">
        <h1 class="text-center">
          {{ config('app.name', 'Laravel') }}
        </h1>
      </a>
    </div>
  </header>
  <div class="container mt-0">
    <div class="row justify-content-center ">
      <div class="col-md-6 my-auto">
        <div class="">
          <h2 class="text-center">Sign in</h2>
          <div class="card-body ">
            <form method="POST" action="{{ route('customLogin') }}">
              @csrf
              <div class=" mx-auto">

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

              <div class="form-group row ">

                {{-- <a class="btn btn-link mx-auto" href="{{ route('register') }}">
                  {{ __('New User? Register Here.') }}
                </a> --}}
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
