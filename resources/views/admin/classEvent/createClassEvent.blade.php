@extends('layouts.adminLayout')

@section('content')
  <div class="container p-sm-0 px-md-5 ">
    <h1 class="mb-5">New Course Assignment</h1>

    <form class="" action="{{route('classEvent.store')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}


      <div class="form-group row">
        <label for="course_id" class="col-sm-2 col-form-label">Course:</label>
        <div class="col-sm-10">
          <select id="course_id" class="form-control" name="course_id">
            <option value="">Select a course</option>
            @foreach ($courses as $course)
              <option {{ (old('course_id')==$course->id) ? 'selected':''}} value="{{$course->id}}">{{$course->title}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">Type:</label>
        <div class="col-sm-10">
          <select id="type" class="form-control" name="type">
            <option value="">Select assignment type</option>
            <option {{ (old('type')=='public') ? 'selected':''}} value="public">Public</option>
            <option {{ (old('type')=='private') ? 'selected':''}} value="private">Private</option>
            <option {{ (old('type')=='closed') ? 'selected':''}} value="closed">Closed</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="address_id" class="col-sm-2 col-form-label">Address:</label>
        <div class="col-sm-10">
          <select id="address_id" class="form-control" name="address_id">
            <option value="">Select a course</option>
            @foreach ($addresses as $address)
              <option {{ (old('address_id')==$address->id) ? 'selected':''}} value="{{$address->id}}">{{'(#'.$address->id.') '.$address->getFullAddress()}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="textareaEditor" class="col-sm-2 col-form-label">Description:</label>
        <div class="col-sm-10">
          <textarea id="textareaEditor" class="form-control" name="description" rows="8" cols="80">{!! old('description') !!}</textarea>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Class instructions:</label>
        <div class="col-sm-10">
          <div class="">
            <input name="file" type="file" class="" id="">
          </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="startDate" class="col-sm-2 col-form-label">Start Date:</label>
        <div class="col-sm-10">
          <input class="form-control" type="date" name="startDate" id="startDate" value="{{old('startDate')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="startTimeStart" class="col-sm-2 col-form-label">Start time for Start Date:</label>
        <div class="col-sm-10">
          <input class="form-control" type="time" name="startTimeStart" id="startTimeStart" value="{{old('startTimeStart')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="endTimeStart" class="col-sm-2 col-form-label">End time for Start Date:</label>
        <div class="col-sm-10">
          <input class="form-control" type="time" name="endTimeStart" id="endTimeStart" value="{{old('endTimeStart')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="endDate" class="col-sm-2 col-form-label">End Date:</label>
        <div class="col-sm-10">
          <input class="form-control" type="date" name="endDate" id="endDate" value="{{old('endDate')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="startTimeEnd" class="col-sm-2 col-form-label">Start time for end Date:</label>
        <div class="col-sm-10">
          <input class="form-control" type="time" name="startTimeEnd" id="startTimeEnd" value="{{old('startTimeEnd')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="endTimeEnd" class="col-sm-2 col-form-label">End time for end Date:</label>
        <div class="col-sm-10">
          <input class="form-control" type="time" name="endTimeEnd" id="endTimeEnd" value="{{old('endTimeEnd')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price:</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="price" id="price" value="{{old('price')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="availableSpace" class="col-sm-2 col-form-label">Available Space:</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="availableSpace" id="availableSpace" value="{{old('availableSpace')}}">
        </div>
      </div>

      <div class="form-group row float-right mt-3 p-3">
        <input class="btn btn-secondary px-5" type="submit" value="Add">
      </div>


    </form>
  </div>

@endsection
