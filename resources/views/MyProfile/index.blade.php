@extends('layouts.adminLayout')

@section('content')

<section class="content">
  <div class="row">

    <div class="box">
      <div class="box-header">
        <h2>My Profile</h2>
      </div>
      <div class="box-body">
        <form class="" action="{{route('myProfile.update')}}" method="post">
          {{ csrf_field() }}

          <div class="form-group row">
            <label for="firstName" class="col-sm-2 col-form-label">First name:</label>
            <div class="col-sm-10">
              <input name="firstName" type="text" class="form-control" id="firstName"
                value="{{ Auth::user()->firstName}}" placeholder="First name">
            </div>
          </div>

          <div class="form-group row">
            <label for="lastName" class="col-sm-2 col-form-label">Last name:</label>
            <div class="col-sm-10">
              <input name="lastName" type="text" class="form-control" id="lastName" value="{{ Auth::user()->lastName }}"
                placeholder="Last name">
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Username:</label>
            <div class="col-sm-10">
              <input name="username" type="text" class="form-control" id="username" value="{{ Auth::user()->username }}"
                placeholder="Username">
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
              <input name="email" type="text" class="form-control" id="email" value="{{ Auth::user()->email }}"
                placeholder="Email">
            </div>
          </div>


          <div class="form-group d-flex justify-content-end">
            <input class="btn btn-primary px-5 " type="submit" value="Update">
          </div>
        </form>
      </div>
    </div>

    <div class="box">
      <div class="box-header">
        <h2>Change Password</h2>
      </div>
      <div class="box-body">
        <form class="" action="{{route('myProfile.changePassword')}}" method="post">
          {{ csrf_field() }}

          <div class="form-group row">
            <label for="current_password" class="col-sm-2 col-form-label">Current Password:</label>
            <div class="col-sm-10">
              <input name="current_password" type="password" class="form-control" id="current_password" value=""
                placeholder="Current Password">
            </div>
          </div>


          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password:</label>
            <div class="col-sm-10">
              <input name="password" type="password" class="form-control" id="password" value="" placeholder="Password">
            </div>
          </div>

          <div class="form-group row">
            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password:</label>
            <div class="col-sm-10">
              <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" value=""
                placeholder="Confirm Password">
            </div>
          </div>


          <div class="form-group d-flex justify-content-end">
            <input class="btn btn-primary px-5 " type="submit" value="Update">
          </div>
        </form>
      </div>
    </div>
  </div>

</section>

@endsection