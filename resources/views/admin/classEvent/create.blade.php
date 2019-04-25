@extends('layouts.adminLayout') 
@section('title', 'New Class') 
@section('content')
<div class="container-fluid p-sm-0 px-md-5 ">
  <form class="dropzone" action="{{route('class.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-12 row mx-auto">
      <div class=" col-md-8">
        <div class="box">
          <div class="box-body">

            <div class="form-group row">
              <label for="course" class="col-sm-2 col-form-label">Course:</label>
              <div class="col-sm-10">
                <select id="course" class="form-control select2" name="course_id">
            <option value="">Select a course</option>
            @foreach ($courses as $course)
              <option {{ (old('course_id')==$course->id) ? 'selected':''}} value="{{$course->id}}">{{$course->title}}</option>
            @endforeach
          </select>
              </div>
            </div>


            <div class="form-group row">
              <label for="address_id" class="col-sm-2 col-form-label">Address:</label>
              <div class="col-sm-10">
                <select id="address_id" class="form-control select2" name="address_id">
            <option value="">Select a course</option>
            @foreach ($addresses as $address)
              <option {{ (old('address_id')==$address->id) ? 'selected':''}} value="{{$address->id}}">{{'(#'.$address->id.') '.$address->getFullAddress()}}</option>
            @endforeach
          </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">Class Title:</label>
              <div class="col-sm-10">
                <div class="">
                  <input name="title" type="text" class="form-control" id="title">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="textareaEditor" class="col-sm-2 col-form-label">Description:</label>
              <div class="col-sm-10">
                <textarea id="textareaEditor" class="form-control" name="description" rows="8" cols="80">{!! old('description') !!}</textarea>
              </div>
            </div>

            {{--
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Class instructions:</label>
              <div class="col-sm-10">
                <div class="">
                  <input name="file" type="file" class="" id="">
                </div>
              </div>
            </div> --}}

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
            <div id="endDateDiv" style="display:none">

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
            </div>

            <div class="form-group row">
              <label for="space" class="col-sm-2 col-form-label">Spaces:</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="space" id="space" value="{{old('space')}}">
              </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-sm-2 col-form-label">Price:</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="price" id="price" value="{{old('price')}}">
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4 fixed ">
        <div class="box">
          <div class="box-header">

            <h2>Settings</h2>
          </div>
          <div class="box-body">

            <div class="form-group ">
              <label for="type" class="col col-form-label">Type:</label>
              <div class="col">
                <select class="form-control" name="type" id="type">
                  <option {{ (old('type')=='public') ? 'selected' : '' }} value="public">Public</option>
                  <option {{ (old('type')=='private') ? 'selected' : '' }} value="private">private</option>
                  <option {{ (old('type')=='draft') ? 'selected' : '' }} value="draft">Draft</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="duration" class="col col-form-label">Duration:</label>
              <div class="col">
                <select class="form-control" name="duration" id="duration">
                  <option {{ (old('duration')=='1') ? 'selected' : '' }} value="1">1 day </option>
                  <option {{ (old('duration')=='2') ? 'selected' : '' }} value="2">2 days</option>
                </select>
              </div>
            </div>
            {{--
            <div class="form-group ">
              <div class="col">
                <input name="accredited" type="checkbox" id="accredited" class="filled-in chk-col-blue" value="1">
                <label for="accredited">Accredited </label>
              </div>
            </div> --}}


          </div>
          <div class="form-group row float-right mt-3 p-3">
            <button class="btn btn-success rounded px-5" type="submit"><i class="far fa-save "></i> Save</button>
          </div>
        </div>
      </div>
    </div>

  </form>
</div>
@endsection
 @push('js')
<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
    $('.select2').select2();
$('#duration').on('change', function () {
 if ($(this).val()=='2') {
   $('#endDateDiv').show();
 }else{
  $('#endDateDiv').hide();

 } 
});
});

</script>




@endpush