@extends('layouts.adminLayout')

@section('content')
  {{-- <h1>Course Dashboard</h1> --}}

  <section class="py-3 d-flex justify-content-around my-auto">
    <h2>Course Title</h2>
    <h2>Trainer:</h2>
    <h2>Moderator:</h2>
    <div class="">
      <a class="btn btn-info"href="#">Course outline</a>
    </div>
  </section>

  <div class="table-responsive  box">
    <div class="box-body">


      <table class="table table-hover dataTable table-responsive" >
        <thead>
          <tr class="bg-dark-light">
            <th >#</th>
            <th >Learner</th>
            <th >Pre-course work</th>
            <th >Attendance</th>
            <th >Class-work</th>
            <th >Extn rqst</th>
            <th >Ext deadline</th>
            <th >Post course work submission date</th>
            <th >post course work result</th>
            <th >course Result</th>
            <th >Moderated</th>
            <th ></th>
          </tr>

        </thead>
        <tbody>
          {{-- <tr>
          <td scope="row"><span class="sr-only">0</span> Deadline</td>
          <td ></td>
          <td >Date</td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td >Date</td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
        </tr> --}}
        @for ($i=1; $i <= 20; $i++)

          <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$faker->name}}</td>
            <td>Pass</td>
            <td>Y</td>
            <td>Pass</td>
            <td>N</td>
            <td>Date</td>
            <td>Date</td>
            <td>Pass</td>
            <td>Pass</td>
            <td>Y</td>
            <td><a href="{{route('learnerCourseOverview',[1,2])}}" class="btn btn-success">View</a></td>
          </tr>
        @endfor

      </tbody>
    </table>
  </div>
</div>
<div class="box">
  <div class="box-body">


    <div class="table-responsive ">

      <table class="table table-bordered table-hover" >
        <thead class="bg-dark-light">
          <tr>
            <th scope="col">Moderator Comment</th>
            <th >Comment</th>
            <th >Recommendation</th>
            <th >Moderation Complete</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <th scope="row">13/03/2018</th>
            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
              <td>Fail these students</td>
              <td>Yes</td>

            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="box">
    <div class="box-body">


      <div class="table-responsive w-100">

        <table class="table table-bordered table-hover " >
          <thead class="bg-dark-light">
            <tr>
              <th scope="col">Accreditor Review Date</th>
              <th >Comment</th>
              <th >Recommendation</th>
              <th >AccreditionComplete</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <th scope="row">13/03/2018</th>
              <td>This appears fine</td>
              <td>Approved</td>
              <td>Yes</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="box">
    <div class="box-body">


      <div class="table-responsive w-100">

        <table class="table table-bordered table-hover " >
          <thead class="bg-dark-light">
            <tr>
              <th scope="col">Admin Comment</th>
              <th >Notes</th>
              <th >Action</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <th scope="row">13/03/2018</th>
              <td>This course uses Morris raisers only</td>
              <td>Make sure all learners are told this at the start of the class</td>

            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="">
    <a class="btn btn-info" href="#">Download</a>
    <a class="btn btn-info" href="#">Print</a>
  </div>


@endsection
