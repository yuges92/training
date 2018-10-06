@extends('layouts.adminLayout')

@section('content')
  <div class="container p-sm-0 px-md-5 ">
    <h1 class="mb-5">New User</h1>

      <form class="" action="{{route('users.update', $user->id)}}" method="post">
      {{ csrf_field() }}
      @method('PUT')

      <div class="form-group row">
        <label for="role" class="col-sm-2 col-form-label">Role:</label>
        <div class="col-sm-10">
          <select class="form-control" name="role" id="role">
            <option {{ ($user->role=='Super Admin') ? 'selected' : '' }} value="Super Admin">Super Admin</option>
            <option {{ ($user->role=='Admin') ? 'selected' : '' }} value="Admin">Admin</option>
            <option {{ ($user->role=='Manager') ? 'selected' : '' }} value="Manager">Manager</option>
            <option {{ ($user->role=='Trainer') ? 'selected' : '' }} value="Trainer">Trainer</option>
            <option {{ ($user->role=='Moderator') ? 'selected' : '' }} value="Moderator">Moderator</option>
            <option {{ ($user->role=='OCN') ? 'selected' : '' }} value="OCN">OCN</option>
            <option {{ ($user->role=='Learner') ? 'selected' : '' }} value="Learner">Learner</option>
            <option {{ ($user->role=='Commissioner') ? 'selected' : '' }} value="Commissioner">Commissioner</option>
          </select>
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
  </div>

@endsection
