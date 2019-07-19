@extends('layouts.adminLayout')

@section('content')
  <div class="container p-sm-0 px-md-5 ">
      <div class="box">
          <div class="box-body">


    <h1 class="mb-5">New Course Assignment</h1>

    <form class="" action="{{route('classAddress.store')}}" method="post">
      {{ csrf_field() }}


      <div class="form-group row">
        <label for="line1" class="col-sm-2 col-form-label">Line 1:</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="line1" id="line1" value="{{old('line1')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="line2" class="col-sm-2 col-form-label">Line 2:</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="line2" id="line2" value="{{old('line2')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="town" class="col-sm-2 col-form-label">Town:</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="town" id="town" value="{{old('town')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="county" class="col-sm-2 col-form-label">County:</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="county" id="county" value="{{old('county')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="postcode" class="col-sm-2 col-form-label">Postcode:</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="postcode" id="postcode" value="{{old('postcode')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="country" class="col-sm-2 col-form-label">Country:</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="country" id="country" value="{{old('country')}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="ckEditor" class="col-sm-2 col-form-label">Detail:</label>
        <div class="col-sm-10">
          <textarea id="ckEditor" class="form-control summernote" name="detail" rows="8" cols="80">{{ old('detail') }}</textarea>
        </div>
      </div>


      <div class="d-flex justify-content-end my-3">
        <input class="btn btn-primary px-5" type="submit" value="Save">
      </div>


    </form>
</div>
</div>
  </div>

@endsection
