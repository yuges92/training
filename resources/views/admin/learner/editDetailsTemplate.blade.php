<form class="mt-3" action="{{route('userDetail.update', $learner->detail->id)}}" method="post">
  {{ csrf_field() }}
  @method('PUT')

  {{-- <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
    <div class="col-sm-10">
      <input name="phone" type="text" class="form-control" id="phone" value="{{ $learner->detail->phone}}" placeholder="Phone">
    </div>
  </div> --}}

  <input type="hidden" name="user_id" value="{{$learner->id}}">


  <div class="form-group row">
    <label for="jobStatus" class="col-sm-2 col-form-label">Job Status:</label>
    <div class="col-sm-10">
      <select class="form-control" name="jobStatus" id="jobStatus" required="">
        <option value="">Please Select an Option</option>
        <option {{ $learner->detail->jobStatus=='10' ? 'selected': ''}} value="10" >Paid Employment </option>
        <option {{ $learner->detail->jobStatus=='11' ? 'selected': ''}} value="11">Not in paid employment</option>
        <option {{ $learner->detail->jobStatus=='12' ? 'selected': ''}} value="12">Not able to work </option>
        <option {{ $learner->detail->jobStatus=='98' ? 'selected': ''}} value="98">Not known </option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="jobRole" class="col-sm-2 col-form-label">Job Role/Title:</label>
    <div class="col-sm-10">
      <input name="jobRole" type="text" class="form-control" id="jobRole" value="{{ $learner->detail->jobRole}}" placeholder="Job Role/Title">
    </div>
  </div>

  {{-- <div class="form-group row">
    <label for="organisation" class="col-sm-2 col-form-label">Organisation:</label>
    <div class="col-sm-10">
      <input name="organisation" type="text" class="form-control" id="organisation" value="{{ $learner->detail->organisation}}" placeholder="Organisation" >
    </div>
  </div> --}}

  <div class="form-group row">
    <label for="dob" class="col-sm-2 col-form-label">Date of birth:</label>
    <div class="col-sm-10">
      <input name="dob" type="date" class="form-control" id="dob" value="{{ $learner->detail->dob->format('Y-m-d')}}" placeholder="DOB" >
    </div>
  </div>

  <div class="form-group row">
    <label for="gender" class="col-sm-2 col-form-label">Gender:</label>
    <div class="col-sm-10">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $learner->detail->gender=='male' ? 'checked': ''}} required="">
        <label class="form-check-label" for="male">Male</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $learner->detail->gender=='female' ? 'checked': ''}} required="">
        <label class="form-check-label" for="female">Female</label>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="ethnicity" class="col-sm-2 col-form-label">Ethnicity:</label>
    <div class="col-sm-10">
      <select class=" form-control " name="ethnicity" id="ethnicity" required="">
        <option value="">Please Select an Option</option>
        <option {{ $learner->detail->ethnicity=='31' ? 'selected': ''}} value="31">White - English /Welsh /Scottish /Northern Irish /British</option>
        <option {{ $learner->detail->ethnicity=='32' ? 'selected': ''}} value="32">White - Irish</option>
        <option {{ $learner->detail->ethnicity=='33' ? 'selected': ''}} value="33">White - Gypsy or Irish Traveller</option>
        <option {{ $learner->detail->ethnicity=='34' ? 'selected': ''}} value="34">White - Any Other White Background</option>
        <option {{ $learner->detail->ethnicity=='35' ? 'selected': ''}} value="35">Mixed /Multiple Ethnic Group - White and Black Caribbean</option>
        <option {{ $learner->detail->ethnicity=='36' ? 'selected': ''}} value="36">Mixed /Multiple Ethnic Group - White and Black African</option>
        <option {{ $learner->detail->ethnicity=='37' ? 'selected': ''}} value="37">Mixed /Multiple Ethnic Group - White and Asian</option>
        <option {{ $learner->detail->ethnicity=='38' ? 'selected': ''}} value="38">Mixed /Multiple Ethnic Group - Any Other Mixed / Multiple Ethnic Background</option>
        <option {{ $learner->detail->ethnicity=='39' ? 'selected': ''}} value="39">Asian / Asian British - Indian</option>
        <option {{ $learner->detail->ethnicity=='40' ? 'selected': ''}} value="40">Asian / Asian British - Pakistani</option>
        <option {{ $learner->detail->ethnicity=='41' ? 'selected': ''}} value="41">Asian / Asian British - Bangladeshi</option>
        <option {{ $learner->detail->ethnicity=='42' ? 'selected': ''}} value="42">Asian / Asian British - Chinese</option>
        <option {{ $learner->detail->ethnicity=='43' ? 'selected': ''}} value="43" selected="">Asian / Asian British - Any Other Asian Background</option>
        <option {{ $learner->detail->ethnicity=='44' ? 'selected': ''}} value="44">Black / African / Caribbean / Black British - African</option>
        <option {{ $learner->detail->ethnicity=='45' ? 'selected': ''}} value="45">Black / African / Caribbean / Black British - Caribbean</option>
        <option {{ $learner->detail->ethnicity=='46' ? 'selected': ''}} value="46">Black / African / Caribbean / Black British - Any Other Black / African / Caribbean Background</option>
        <option {{ $learner->detail->ethnicity=='47' ? 'selected': ''}} value="47">Other Ethnic Group - Arab</option>
        <option {{ $learner->detail->ethnicity=='98' ? 'selected': ''}} value="98">Other Ethnic Group - Any Other Ethnic Group</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="ability" class="col-sm-2 col-form-label">Ability:</label>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="ability" id="ability1" value="1" required="" {{ $learner->detail->ability=='1' ? 'checked': ''}}>
        <label class="form-check-label" for="ability1">
          Learner considers themselves to have a learning difficulty and/or disability and/or health problem
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="ability" id="ability2" value="2" required="" {{ $learner->detail->ability=='2' ? 'checked': ''}}>
        <label class="form-check-label" for="ability2">
          Learner does not consider they have a learning difficulty and/or disability and/or health problem
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="ability" id="ability3" value="9" required="" {{ $learner->detail->ability=='9' ? 'checked': ''}}>
        <label class="form-check-label" for="ability3">
          Do not wish to disclose
        </label>
      </div>

    </div>
  </div>

  <div class="form-group row">
    <label for="disability" class="col-sm-2 col-form-label">Disability/Difficulty:</label>
    <div class="col-sm-10">
      <small>The course may require bending, kneeling and standing for periods of time. There will be visual presentations,
        workbooks and written work to be completed. Please tell us if you would have any difficulties with these and what might help.</small>
        <textarea class="form-control" name="disability" rows="8" cols="80" id="disability">{{$learner->detail->disability}}</textarea>
      </div>
    </div>

    <div class="form-group row float-right mt-3 p-3">
      <input class="btn btn-secondary px-5" type="submit" value="Update">
    </div>

  </form>
