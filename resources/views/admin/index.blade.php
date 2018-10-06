@extends('layouts.adminLayout')

@section('content')
<h1>Dashboard</h1>
<div class="d-flex justify-content-start row mx-auto">
<a href="/admin/users" class="custom-icon-card mx-auto">
  <div class="card-body mx-auto text-center">
    <i class="fas fa-users custom-icon"></i>
    <h5 class="card-title">All Users</h5>
  </div>
</a>

<a href="/admin/learners" class="custom-icon-card mx-auto">
  <div class="card-body mx-auto text-center">
    <i class="fa fa-user-graduate custom-icon"></i>
    <h5 class="card-title">Learners</h5>
  </div>
</a>

<a href="/admin/classTrainer" class="custom-icon-card mx-auto">
  <div class="card-body mx-auto text-center">
    <i class="fa fa-chalkboard-teacher custom-icon"></i>
    <h5 class="card-title">Trainers</h5>
  </div>
</a>

<a href="/admin/courses" class="custom-icon-card mx-auto">
  <div class="card-body mx-auto text-center">
    <i class="fa fa-graduation-cap custom-icon"></i>
    <h5 class="card-title">Courses</h5>
  </div>
</a>

<a href="/admin/classEvent" class="custom-icon-card mx-auto">
  <div class="card-body mx-auto text-center">
    <i class="fa fa-calendar custom-icon"></i>
    <h5 class="card-title">Classes/Events</h5>
  </div>
</a>


<a href="/" class="custom-icon-card mx-auto">
  <div class="card-body mx-auto text-center">
    <i class="fas fa-list-alt custom-icon"></i>
    <h5 class="card-title">Bookings</h5>
  </div>
</a>

<a href="/" class="custom-icon-card mx-auto">
  <div class="card-body mx-auto text-center">
    <i class="fas fa-exclamation custom-icon"></i>
    <h5 class="card-title">Notifications</h5>
  </div>
</a>


</div>

@endsection
