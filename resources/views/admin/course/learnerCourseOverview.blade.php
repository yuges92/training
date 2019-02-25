@extends('layouts.adminLayout')

@section('content')
  {{-- <h1>Course Dashboard</h1> --}}

  <section class="d-flex justify-content-around my-auto">
    <h2>Course Title</h2>
    <h2>Trainer:</h2>
    <h2>Moderator:</h2>
    <div class="">
      <a class="btn btn-info"href="#">Course outline</a>
    </div>
  </section>
  <div class="table-responsive  box">
    <div class="box-body">


      <table class="table table-hover" >
        <thead class="bg-dark-light">
          <tr>
            <th >#</th>
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

          <tr>
            <th scope="row"></th>
            <td>Pass</td>
            <td>Y</td>
            <td>Pass</td>
            <td>N</td>
            <td>Date</td>
            <td>Date</td>
            <td>Pass</td>
            <td>Pass</td>
            <td>Y</td>
            <td><a href="" class="btn btn-success">Update</a></td>
          </tr>

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
              <th>Assessment Criteria</th>
              <th >Assignment</th>
              <th >Result</th>
              <th class="col w-50">Trainer's Comments</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <th scope="row">1.1 Lorem ipsum dolor sit amet, consectetur</th>
              <td><a href="#">Pre-course</a>.</td>
              <td>Pass</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </td>
            </tr>

            <tr>
              <th scope="row">1.2 Lorem ipsum dolor sit amet, consectetur</th>
              <td><a href="#">Classroom</a>.</td>
              <td>Pass</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </td>
            </tr>

            <tr>
              <th scope="row">1.2 Lorem ipsum dolor sit amet, consectetur</th>
              <td><a href="#">Pre-course</a>.</td>
              <td>Pass</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </td>
            </tr>

            <tr class="bg-dark-light">
              <th class="text-center my-auto">Trainer overall comment</th>
              <td></td>
              <td>Pass</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </td>
            </tr>

          </tbody>
        </table>
      </div>
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
            </tr>
          </thead>
          <tbody>

            <tr>
              <th scope="row">13/03/2018</th>
              <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                <td>Fail these students</td>
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
                <td>Doris did not receive the email reminding her of homework deadline as she moved house</td>
                <td>Gave extention deadline of 1 month</td>

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
