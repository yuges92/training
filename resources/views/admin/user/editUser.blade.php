@extends('layouts.adminLayout')

@section('content')
  {{-- <div class="container p-sm-0 px-md-5 ">
  <h1 class="mb-5">New User</h1>

  <form class="" action="{{route('users.update', $user->id)}}" method="post">
  {{ csrf_field() }}
  @method('PUT')

  <div class="form-group row">
  <label for="role" class="col-sm-2 col-form-label">Role:</label>
  <div class="col-sm-10 row">

  @if ($roles)
  @foreach ($roles as $role)
  <div class="checkbox col-6">
  <input type="checkbox" name="role[]" id="Checkbox_{{$role->id}}" {{ ($role->name==$user->hasRole($role->name)) ? 'checked' : '' }} value="{{$role->id}}">
  <label for="Checkbox_{{$role->id}}">{{$role->name}}</label>
</div>
@endforeach
@endif


</div>
</div>


<div class="form-group row">
<label for="firstName" class="col-sm-2 col-form-label">First name:</label>
<div class="col-sm-10">
<input name="firstName" type="text" class="form-control" id="firstName" value="{{ $user->firstName}}" placeholder="First name">
</div>
</div>

<div class="form-group row">
<label for="lastName" class="col-sm-2 col-form-label">Last name:</label>
<div class="col-sm-10">
<input name="lastName" type="text" class="form-control" id="lastName" value="{{ $user->lastName }}" placeholder="Last name">
</div>
</div>

<div class="form-group row">
<label for="email" class="col-sm-2 col-form-label">Email:</label>
<div class="col-sm-10">
<input name="email" type="text" class="form-control" id="email" value="{{ $user->email }}" placeholder="Email" readonly>
</div>
</div>


<div class="form-group row float-right mt-3 p-3">
<input class="btn btn-secondary px-5" type="submit" value="Update">
</div>


</form>
</div> --}}

<section class="content">
  <div class="row">
    <div class="col-xl-4 col-lg-5 p-0">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="//www.bsn.eu/wp-content/uploads/2016/12/user-icon-image-placeholder-300-grey.jpg" alt="User profile picture">
          <h3 class="profile-username text-center">{{$user->getFullname()}}</h3>
          <div class="d-flex justify-content-center">
            <form class="" action="" method="post">
              {{ csrf_field() }}
              @method('PUT')
              <div class="form-group">
                <input class="btn btn-warning px-5 " type="submit" value="Reset Password">
              </div>
            </form>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="profile-user-info">
                <p>Email address </p>
                <h6 class="margin-bottom">{{$user->email}}</h6>
                <p>Phone</p>
                <h6 class="margin-bottom">{{$user->phone}}</h6>
                @if ($address=$user->getAddressByType('home'))

                  <p>Address</p>
                  <h6 class="">
                    <address class="">
                      {{$address->line1}}<br>
                      {{$address->town}}<br>
                      {{$address->county}}<br>
                      {{$address->postcode}}<br>
                      {{$address->country}}<br>
                    </address>
                  </h6>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 col-lg-7">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">

          <li><a href="#detail" data-toggle="tab" class="active" aria-expanded="true">Detail </a></li>
          <li><a href="#additionalDetail" data-toggle="tab" class="" aria-expanded="false">Additional Details</a></li>
          <li><a href="#addresses" data-toggle="tab" class="" aria-expanded="false">Addresses</a></li>
          <li><a href="#bookings" data-toggle="tab" class="" aria-expanded="false">Bookings</a></li>
          <li><a href="#gdpr" data-toggle="tab" class="" aria-expanded="false">GDPR</a></li>
          <li><a href="#courses" data-toggle="tab" class="" aria-expanded="false">Courses</a></li>
        </ul>

        <div class="tab-content">

          <div class="tab-pane active" id="detail" aria-expanded="false">
            <div class=" p-sm-0 px-md-5 ">
              <form class="" action="{{route('users.update', $user->id)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')

                <div class="form-group row">
                  <label for="role" class="col-sm-2 col-form-label">Role:</label>
                  <div class="col-sm-10 row">

                    @if ($roles)
                      @foreach ($roles as $role)
                        <div class="checkbox col-6">
                          <input type="checkbox" name="role[]" id="Checkbox_{{$role->id}}" {{ ($role->name==$user->hasRole($role->name)) ? 'checked' : '' }} value="{{$role->id}}">
                          <label for="Checkbox_{{$role->id}}">{{$role->name}}</label>
                        </div>
                      @endforeach
                    @endif

                  </div>
                </div>


                <div class="form-group row">
                  <label for="firstName" class="col-sm-2 col-form-label">First name:</label>
                  <div class="col-sm-10">
                    <input name="firstName" type="text" class="form-control" id="firstName" value="{{ $user->firstName}}" placeholder="First name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="lastName" class="col-sm-2 col-form-label">Last name:</label>
                  <div class="col-sm-10">
                    <input name="lastName" type="text" class="form-control" id="lastName" value="{{ $user->lastName }}" placeholder="Last name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Username:</label>
                  <div class="col-sm-10">
                    <input name="username" type="text" class="form-control" id="username" value="{{ $user->email }}" placeholder="Username" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email:</label>
                  <div class="col-sm-10">
                    <input name="email" type="text" class="form-control" id="email" value="{{ $user->username }}" placeholder="Email">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Type:</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option value="approved" {{($user->type=='approved') ?'selected' :''}}>Approved</option>
                      <option value="blocked"  {{($user->type=='blocked') ?'selected' :''}}>Blocked</option>
                      <option value="pending"  {{($user->type=='pending') ?'selected' :''}}>Pending</option>
                    </select>
                  </div>
                </div>

                <div class="form-group d-flex justify-content-end">
                  <input class="btn btn-primary px-5 " type="submit" value="Update">
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>

@endsection
