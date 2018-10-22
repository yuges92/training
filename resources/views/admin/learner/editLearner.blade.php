@extends('layouts.adminLayout')

@section('content')
  <div class="container-fluid p-sm-0 px-md-5 ">
    <h1 class="mb-5">{{$learner->getFullname()}}</h1>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#learnerDetails">Learner Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#additionalDetails">Additional Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#address">Address</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#gdpr">GDPR Consent</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#courses">Courses</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content mt-3">
      {{--Tab for learner details  --}}
      <div class="tab-pane  active mb-3" id="learnerDetails">
        <form class="mt-3" action="" method="post">

          <div class="form-group row">
            <label for="firstName" class="col-sm-2 col-form-label">First name:</label>
            <div class="col-sm-10">
              <input name="firstName" type="text" class="form-control" id="firstName" value="{{ $learner->firstName}}" placeholder="First name" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="lastName" class="col-sm-2 col-form-label">Last name:</label>
            <div class="col-sm-10">
              <input name="lastName" type="text" class="form-control" id="lastName" value="{{ $learner->lastName }}" placeholder="Last name" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
              <input name="email" type="text" class="form-control" id="email" value="{{ $learner->email }}" placeholder="Email" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="organisation" class="col-sm-2 col-form-label">Organisation:</label>
            <div class="col-sm-10">
              <input name="organisation" type="text" class="form-control" id="organisation" value="{{ $learner->organisation }}" placeholder="Organisation" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
            <div class="col-sm-10">
              <input name="phone" type="text" class="form-control" id="phone" value="{{ $learner->phone }}" placeholder="Phone" readonly>
            </div>
          </div>

          <div class="form-group row float-right mt-3 p-3">
            <a href="{{route('users.edit', $learner->id)}}" class="btn btn-secondary px-5">Edit</a>
          </div>

        </form>
      </div>

      {{--Tab for learner additional details  --}}
      <div class="tab-pane  fade" id="additionalDetails">
        @if ($learner->detail)
          @include('admin.learner.editDetailsTemplate')
        @else
          @include('admin.learner.addDetailsTemplate')
        @endif
      </div>

      {{--Tab for learner courses  --}}
      <div class="tab-pane  fade  " id="address">
        <div class="col-12">
          <h2>Home Address</h2>
          @php
          $address=$learner->getAddressByType('home');
          $type='home';
          @endphp
          @if ($learner->getAddressByType('home'))
            @include('admin.learner.editAddressTemplate')
          @else
            @include('admin.learner.addAddressTemplate')
          @endif
        </div>

        <div class="col-12">
          <h2>Billing Address</h2>
          @php
          $address=$learner->getAddressByType('billing');
          $type='billing';

          @endphp
          <div class="form-group row">
            <label for="billingFirstname" class="col-sm-2 col-form-label">First name:</label>
            <div class="col">
              <input name="billingFirstname" type="text" class="form-control" id="billingFirstname" value=""  >
            </div>
          </div>
          <div class="form-group row">
            <label for="billingLastname" class="col-sm-2 col-form-label">Last name:</label>
            <div class="col">
              <input name="billingLastname" type="text" class="form-control" id="billingLastname" value=""  >
            </div>
          </div>
          <div class="form-group row">
            <label for="billingOrganisation" class="col-sm-2 col-form-label">Organisation:</label>
            <div class="col">
              <input name="billingOrganisation" type="text" class="form-control" id="billingOrganisation" value=""  >
            </div>
          </div>
          @if ($learner->getAddressByType('billing'))
            @include('admin.learner.editAddressTemplate')
          @else
            @include('admin.learner.addAddressTemplate')
          @endif
        </div>

      </div>



      {{--Tab for learner gdpr consent  --}}
      <div class="tab-pane  fade" id="gdpr">
        <form class="mt-3" action="" method="post">


            <div class="form-group row">
              <label for="agreed" class="col-sm-3 col-form-label ">Agreed To GDPR Consent:</label>
              <div class="col-sm-3">
                <input name="agreed" type="text" class="form-control" id="agreed" value="{{( $learner->gdpr)? $learner->gdpr->agreed:'No'}}" readonly>
              </div>
            </div>
            @if ($learner->gdpr&& $learner->gdpr->agreed=='yes')
              <span class="text-info">Can be contacted by:</span>
              <div class="form-group row">
                <label for="byEmail" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-3">
                  <input name="byEmail" type="text" class="form-control" id="byEmail" value="{{ $learner->gdpr->byEmail }}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="byPhone" class="col-sm-3 col-form-label">Phone:</label>
                <div class="col-sm-3">
                  <input name="byPhone" type="text" class="form-control" id="byPhone" value="{{ $learner->gdpr->byPhone }}"  readonly>
                </div>
              </div>
            @endif

        </form>

      </div>


      {{--Tab for learner address  --}}
      <div class="tab-pane  fade" id="courses">

        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#giveCourseAccessDiv" aria-expanded="false" aria-controls="giveCourseAccessDiv">
          Give Course Access
        </button>
        <div class="collapse col-md-8  card my-3" id="giveCourseAccessDiv">

          <form class="" action="{{route('giveStudentClassAccess')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{$learner->id}}">
            <div class="form-group">
              <label for="course_id">Course:</label>
              <select class="form-control" id="course_id" name="course_id">
                <option value="">Select a Course</option>
                @foreach ($courses as $course)
                  <option value="{{$course->id}}">{{'#'.$course->id.' '.$course->title}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="role_id">Class:</label>
              <select class="form-control" id="class_id" name="class_id" >
                <option value="">Please Select a Class</option>
              </select>
            </div>

            <div class="form-group">
              <input class="btn btn-secondary px-5" type="submit" value="Add">
            </div>
          </form>

        </div>

        <table class="table table-hover table-sm">
          <thead>
            <tr>
              <th>Class ID</th>
              <th>Class</th>
              <th>Course Title</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($learner->learnerClasses as $class)
              <tr>
                <th >{{$class->id}}</th>
                <td>{{$class->getStartEndDate()}}</td>
                <td>{{$class->course->title}}</td>
                <td>
                  <form class="deleteForm" action="{{route('removeClassAccess',[$class->id, $learner->id])}}" method="post">
                    {{ csrf_field() }}
                    @method('Delete')
                    <input type="hidden" name="user_id" value="{{$learner->id}}">
                    <input class="btn btn-danger" type="submit" value="Delete">
                  </form>
                </td>
              @endforeach
            </tr>
          </tbody>
        </table>
      </div>

    </div>


  </div>

@endsection
