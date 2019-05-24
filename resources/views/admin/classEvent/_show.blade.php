@extends('layouts.adminLayout') 
@section('title', $class->title) 
@section('content')
{{-- <div class="my-3 container-fluid d-flex justify-content-around">

    <a class="btn btn-info btn-lg rounded" href="{{route('class.edit', $class->id)}}">
        <i class="col-12 fas fa-edit  fa-5x"></i> 
        <span class="col-12">Edit</span>
    </a>
    <a class="btn btn-info btn-lg rounded" href="{{route('class.edit', $class->id)}}">
        <i class="col-12 fa fa-calendar fa-5x"></i>
        <span class="col-12">Classes</span>
    </a>
    <a class="btn btn-info btn-lg rounded" href="{{route('class.edit', $class->id)}}">
        <i class="col-12 fa fa-tasks fa-5x"></i>
        <span class="col-12">Assignments</span>
    </a>

</div> --}}



<div class="col-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">

            <li><a href="#detail" data-toggle="tab" class="active" aria-expanded="true">Class Detail </a></li>
            <li><a href="#additionalDetail" data-toggle="tab" class="" aria-expanded="false">Trainers</a></li>
            <li><a href="#bookings" data-toggle="tab" class="" aria-expanded="false">Bookings</a></li>
            <li><a href="#gdpr" data-toggle="tab" class="" aria-expanded="false">Learners</a></li>
            <li><a href="#courses" data-toggle="tab" class="" aria-expanded="false">Course</a></li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="detail" aria-expanded="false">
                
            </div>

        </div>
    </div>
</div>
@endsection