@extends('layouts.adminLayout')

@section('content')
  <div class="container-fluid">
    <h1 class="mb-5">New User</h1>

    <div class="box">
      <div class="box-body">

      
      <form class="p-md-5" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group row">
        <label for="role" class="col-sm-2 col-form-label">Role:</label>
        <div class="col-sm-10 row">
          @if ($roles)
            @foreach ($roles as $role)
            @if ($role->name=="Super Admin" )
            @if (Auth::user()->isSuperAdmin())
                
                    
            <div class="checkbox col-md-6">
              <input type="checkbox" name="role[]" id="Checkbox_{{$role->id}}" {{ (old('role')==$role->id) ? 'checked' : '' }} value="{{$role->id}}">
              <label for="Checkbox_{{$role->id}}">{{$role->name}}</label>
            </div>
            @endif

            @else
            <div class="checkbox col-md-6">
                <input type="checkbox" name="role[]" id="Checkbox_{{$role->id}}" {{ (old('role')==$role->id) ? 'checked' : '' }} value="{{$role->id}}">
                <label for="Checkbox_{{$role->id}}">{{$role->name}}</label>
              </div>
            @endif
            @endforeach
          @endif
        </div>
      </div>

      <div class="form-group row">
          <label for="image" class="col-sm-2 col-form-label">Profile Image <small>(optional)</small>: </label>
          <div class="col-sm-10">
              <div class="">
                  <input id="image" type="file" name="image" class="dropify" data-min-height="200" data-min-width="300" data-allowed-file-extensions="png JPEG jpg"
                      data-max-file-size="1MB">
              </div>
          </div>
      </div>

      <div class="form-group row">
        <label for="firstName" class="col-sm-2 col-form-label">First name:</label>
        <div class="col-sm-10">
          <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
        </div>
      </div>

      <div class="form-group row">
        <label for="lastName" class="col-sm-2 col-form-label">Last name:</label>
        <div class="col-sm-10">
          <input name="lastName" type="text" class="form-control" id="lastName" value="{{ old('lastName') }}" placeholder="Last name">
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
          <input name="email" type="text" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email">
        </div>
      </div>

      <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username:</label>
        <div class="col-sm-10">
          <input name="username" type="text" class="form-control" id="username" value="{{ old('username') }}" placeholder="Username">
        </div>
      </div>

      <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Type:</label>
          <div class="col-sm-10">
            <select class="form-control"  name="status">
              <option value="approved" {{(old('status')=='approved') ?'selected' :''}}>Approved</option>
              <option value="blocked" {{(old('status')=='blocked') ?'selected' :''}}>Blocked</option>
              <option value="pending" {{(old('status')=='pending') ?'selected' :''}}>Pending</option>
            </select>
          </div>
        </div>


      <div class="form-group ">
        <div class="col-sm-10 offset-sm-2 ">

          <div class="checkbox">
            <input type="checkbox" name="notify" id="notify" {{ (old('notify')) ? 'notify' : '' }} value="1}">
            <label for="notify">Notify user about the account:</label>
          </div>
        </div>
      </div>

      <div class="form-group row float-right mt-3 p-3">
        <input class="btn btn-primary px-5" type="submit" value="Add">
      </div>


    </form>
  </div>
</div>
</div>

@endsection
