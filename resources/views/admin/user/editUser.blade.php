@extends('layouts.adminLayout')

@section('content')


<section class="content">
  <div class="row">
    <div class="col-xl-4 col-lg-5 p-0">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <form action="{{route('profile.changeImage', $user->id)}}" class="" enctype="multipart/form-data"
            method="POST">
            @csrf
            <div class="form-group mx-auto">
              <label for="image" class=" sr-only">Profile Image <small>(optional)</small>: </label>
              <div class="col">
                <div class="">
                  <input id="image" type="file" name="image" class="dropify" data-min-height="200" data-min-width="300"
                    data-allowed-file-extensions="png JPEG jpg" data-max-file-size="1MB"
                    data-default-file="{{$user->getImage()}}">
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-end mr-4">
              <button class="btn btn-info" type="submit">Save</button>
            </div>
          </form>

          <div class="row">
            <div class="col-12">
              <div class="profile-user-info">
                <h3 class="profile-username ">{{$user->getFullname()}}</h3>
                <h4 class="margin-bottom"> {{$user->email}}</h4>

                <h4 class="margin-bottom">{{$user->phone}}</h4>
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
      <div class="box">
        <div class="box-body">
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
                    @if ($role->name=="Super Admin" )
                    @if (Auth::user()->isSuperAdmin())

                    <div class="checkbox col-md-6">
                      <input type="checkbox" name="role[]" id="Checkbox_{{$role->id}}"
                        {{ ($user->roles->contains('name', $role->name)) ? 'checked' : '' }} value="{{$role->id}}">
                      <label for="Checkbox_{{$role->id}}">{{$role->name}}</label>
                    </div>
                    @endif

                    @else
                    <div class="checkbox col-md-6">
                      <input type="checkbox" name="role[]" id="Checkbox_{{$role->id}}"
                        {{ ($user->roles->contains('name', $role->name)) ? 'checked' : '' }} value="{{$role->id}}">
                      <label for="Checkbox_{{$role->id}}">{{$role->name}}</label>
                    </div>
                    @endif
                    @endforeach
                    @endif

                  </div>
                </div>


                <div class="form-group row">
                  <label for="firstName" class="col-sm-2 col-form-label">First name:</label>
                  <div class="col-sm-10">
                    <input name="firstName" type="text" class="form-control" id="firstName"
                      value="{{ $user->firstName}}" placeholder="First name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="lastName" class="col-sm-2 col-form-label">Last name:</label>
                  <div class="col-sm-10">
                    <input name="lastName" type="text" class="form-control" id="lastName" value="{{ $user->lastName }}"
                      placeholder="Last name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Username:</label>
                  <div class="col-sm-10">
                    <input name="username" type="text" class="form-control" id="username" value="{{ $user->username }}"
                      placeholder="Username" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email:</label>
                  <div class="col-sm-10">
                    <input name="email" type="text" class="form-control" id="email" value="{{ $user->email }}"
                      placeholder="Email">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Type:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="status">
                      <option value="approved" {{($user->status=='approved') ?'selected' :''}}>Approved</option>
                      <option value="blocked" {{($user->status=='blocked') ?'selected' :''}}>Blocked</option>
                      <option value="pending" {{($user->status=='pending') ?'selected' :''}}>Pending</option>
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