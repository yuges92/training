<form class="" action="{{route('address.update',$address->id)}}" method="post">
  {{ csrf_field() }}

  @method('PUT')

  <input type="hidden" name="type" value="{{$type}}">
  <div class="form-group row">
    <label for="{{$type}}line1" class="col-sm-2 col-form-label">Line 1:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="line1" id="{{$type}}line1" value="{{$address->line1}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="{{$type}}line2" class="col-sm-2 col-form-label">Line 2:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="line2" id="{{$type}}line2" value="{{$address->line2}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="{{$type}}town" class="col-sm-2 col-form-label">Town:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="town" id="{{$type}}town" value="{{$address->town}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="{{$type}}county" class="col-sm-2 col-form-label">County:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="county" id="{{$type}}county" value="{{$address->county}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="{{$type}}postcode" class="col-sm-2 col-form-label">Postcode:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="postcode" id="{{$type}}postcode" value="{{$address->postcode}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="{{$type}}country" class="col-sm-2 col-form-label">Country:</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="country" id="{{$type}}country" value="{{$address->country}}">
    </div>
  </div>


  <div class="form-group row  mt-3 p-3 d-flex justify-content-end">
    <input class="btn btn-secondary px-5" type="submit" value="Update">
  </div>


</form>
