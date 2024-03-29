@extends('layouts.learner')

@section('content')
  <div class="row mx-auto">
    <div class="col-lg-6">
      <div class="box box-default">
        <div class="box-header">

          <h2>My Course Overview</h2>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
          </div>
        </div>
        <div class="box-body">

          <div class="col-md-12">

            <div class="progress-group">
              <span class="progress-text">Course Title</span>
              <span class="progress-number"><b>70%</b></span>

              <div class="progress sm">
                <div class="progress-bar progress-bar-aqua" style="width: 70%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text">Course Title</span>
              <span class="progress-number"><b>75%</b></span>

              <div class="progress sm">
                <div class="progress-bar progress-bar-red" style="width: 75%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text">Course Title</span>
              <span class="progress-number"><b>50%</b></span>

              <div class="progress sm">
                <div class="progress-bar progress-bar-green" style="width: 50%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text">Course Title</span>
              <span class="progress-number"><b>85%</b></span>

              <div class="progress sm">
                <div class="progress-bar progress-bar-yellow" style="width: 85%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="box box-default">
        <div class="box-header">

          <h2>Upcoming Courses</h2>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover table-responsive-md">
            <tbody><tr>
              <th>Course</th>
              <th>Date</th>
              <th>Status</th>
            </tr>
            <tr>
              <td><a href="javascript:void(0)">Course Title</a></td>
              <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2018</span> </td>
              <td><span class="label label-danger">Pending</span></td>
            </tr>

          </tbody>
        </table>

      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="box box-default">
      <div class="box-header">

        <h2>My Booking Status</h2>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
        </div>
      </div>
      <div class="box-body">
        <table class="table table-hover table-responsive-md">
          <tbody><tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
          </tr>
          <tr>
            <td><a href="javascript:void(0)">#123456</a></td>
            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2018</span> </td>
            <td>£158.00</td>
            <td><span class="label label-danger">Pending</span></td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="col-lg-6">
  <div class="box box-default">
    <div class="box-header">

      <h2>Upcoming Assignment Deadlines</h2>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
      </div>
    </div>
    <div class="box-body">
      <table class="table table-hover table-responsive-md">
        <tbody><tr>
          <th>Course</th>
          <th>Assignment</th>
          <th>Deadline Date</th>
          <th>Status</th>
        </tr>
        <tr>
          <td><a href="javascript:void(0)">Course Title</a></td>
          <td><a href="javascript:void(0)">Assignment Title</a></td>
          <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2018</span> </td>
          <td><span class="label label-success">Completed</span></td>
        </tr>

      </tbody>
    </table>
    </div>
  </div>
</div>

<div class="col-lg-6">
  <div class="box box-default">
    <div class="box-header">

      <h2>Notifications</h2>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
      </div>
    </div>
    <div class="box-body">
      <table class="table table-hover table-striped table-responsive">
        <thead>
          <tr>
            <th>info</th>
            <th>something</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class=""></td>
            <td class="">John Smith</td>
            <td class=""><a href="read-mail.html"><b>Lorem Ipsum</b> - There are many variations of Ipsum available...</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="col-lg-6">
  <div class="box box-default">
    <div class="box-header">

      <h2>Announcements</h2>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
      </div>
    </div>
    <div class="box-body">

    </div>
  </div>
</div>

<div class="col-lg-6">
  <div class="box box-default">
    <div class="box-header">

      <h2>My Messages</h2>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
      </div>
    </div>
    <div class="box-body">

    </div>
  </div>
</div>

<div class="col-lg-6">
  <div class="box box-default">
    <div class="box-header">

      <h2>Featured Courses</h2>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
      </div>
    </div>
    <div class="box-body">

    </div>
  </div>
</div>
</div>






@endsection
