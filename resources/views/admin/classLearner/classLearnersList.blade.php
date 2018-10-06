@extends('layouts.adminLayout')

@section('content')
  <h1>{{$class->course->title}} (<small>{{$class->getStartEndDate()}}</small>)</h1>
  @if (count($class->learners)>0)
    <form class="" action="{{route('updateAttendance', $class->id)}}" method="post">
      {{ csrf_field() }}

    <div class="mt-2 row mx-auto ">
      <select class="form-control col-md-2 mr-2" name="attendance" id="attendance">
        <option value="pending" selected="">Pending</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
      <div class="">
        <input class="btn btn-success" type="submit" value="Update">
        <a href="#" class="btn btn-secondary">Sales Force (Excel)</a>
        <a href="#" class="btn btn-info">OCN (Excel)</a>
      </div>

    </div>
    <table class="table table-hover table-responsive-sm mt-2">
      <thead class="">
        <tr>
          <th><input name="" id="selectAllCheckbox" type="checkbox"></th>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th>DoB</th>
          <th>Postcode</th>
          <th>Male/Female</th>
          <th>Ethnicity</th>
          <th>Learning Status	</th>
          <th>Job Status	</th>
          <th>Booked By	</th>
          <th>Attendance</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($class->learners as $learner)
          <tr>
            <td>
              <input name="user_id[]" id="" type="checkbox" value="{{$learner->id}}">
            </td>
            <th scope="row">{{$learner->id}}</th>
            <td>{{$learner->getFullname()}}</td>
            @if ($learner->details)
            <td>{{$learner->details->getFormattedDoB()}}</td>
            <td>{{($learner->getAddressByType('home')) ? $learner->getAddressByType('home')->postcode :''}}</td>
            <td>{{$learner->details->gender}}</td>
            <td>{{$learner->details->ethnicity}}</td>
            <td>{{$learner->details->ability}}</td>
            <td>{{$learner->details->jobStatus}}</td>
            <td>{{$learner->details->jobStatus}}</td>
          @else
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          @endif

            <td>{{$learner->getAttendace($class->id)->attendance}}</td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </form>

  @else
    <div class="text-center">

      <span class="text-danger">No courses found!</span>
    </div>
  @endif

@endsection
