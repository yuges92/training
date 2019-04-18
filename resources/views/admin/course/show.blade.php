@extends('layouts.adminLayout') 
@section('content')
<h1>Courses</h1>
<div class="my-2 container">
    <a class="btn btn-info" href="{{route('createCourse')}}"> <i class="fas fa-plus"></i> Add New</a>

</div>


<div class="col-12">
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
                    Hello wOrld
                </div>
            </div>

        </div>
    </div>
</div>
@endsection