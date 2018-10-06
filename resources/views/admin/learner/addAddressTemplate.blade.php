<form class="" action="{{route('address.store')}}" method="post">
  {{ csrf_field() }}

<input type="hidden" name="user_id" value="{{$learner->id}}">
<input type="hidden" name="type" value="{{$type}}">
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


  <div class="form-group row  mt-3 p-3 d-flex justify-content-end">
    <input class="btn btn-secondary px-5" type="submit" value="Add">
  </div>


</form>
