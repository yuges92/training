<div class="userDetail">

            <div class="form-group row">
              <label for="firstName" class="col-md-3 col-form-label">First name:</label>
              <div class="col">
                <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
              </div>
            </div>

            <div class="form-group row">
              <label for="lastName" class="col-md-3 col-form-label">Last name:</label>
              <div class="col">
                <input name="lastName" type="text" class="form-control" id="lastName" value="{{ old('lastName') }}" placeholder="Last name">
              </div>
            </div>

            <div class="form-group row">
              <label for="username" class="col-md-3 col-form-label">Username:</label>
              <div class="col">
                <input name="username" type="text" class="form-control" id="username" value="{{ old('username') }}" placeholder="Username">
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-3 col-form-label">Email:</label>
              <div class="col">
                <input name="email" type="text" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email">
              </div>
            </div>

            <div class="form-group row">
              <label for="email_confirmation" class="col-md-3 col-form-label">Confirm Email:</label>
              <div class="col">
                <input name="email_confirmation" type="text" class="form-control" id="email_confirmation" value="{{old('email_confirmation')}}" placeholder="Confirm Email">
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-3 col-form-label">Password:</label>
              <div class="col">
                <input class="form-control" type="password" name="password" id="password" value="" placeholder="Password">
              </div>
            </div>

            <div class="form-group row">
              <label for="password_confirmation" class="col-md-3 col-form-label">Confirm Password:</label>
              <div class="col">
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
              </div>
            </div>


            <div class="form-group row">
              <label for="phone" class="col-md-3 col-form-label">Phone:</label>
              <div class="col">
                <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone')}}" placeholder="Phone">
              </div>
            </div>

            <div class="form-group row">
              <label for="organisation" class="col-md-3 col-form-label">Organisation:</label>
              <div class="col">
                <input name="organisation" type="text" class="form-control" id="organisation" value="{{ old('organisation')}}" placeholder="Organisation" >
              </div>
            </div>

            <div class="Address">
              <div class="form-group row">
                <label for="line1" class="col-md-3 col-form-label">Line 1:</label>
                <div class="col">
                  <input class="form-control" type="text" name="line1" id="line1" value="{{old('line1')}}" placeholder="Address line 1">
                </div>
              </div>

              <div class="form-group row">
                <label for="line2" class="col-md-3 col-form-label">Line 2:</label>
                <div class="col">
                  <input class="form-control" type="text" name="line2" id="line2" value="{{old('line2')}}" placeholder="Address Line 2">
                </div>
              </div>

              <div class="form-group row">
                <label for="town" class="col-md-3 col-form-label">Town:</label>
                <div class="col">
                  <input class="form-control" type="text" name="town" id="town" value="{{old('town')}}" placeholder="Town">
                </div>
              </div>

              <div class="form-group row">
                <label for="county" class="col-md-3 col-form-label">County:</label>
                <div class="col">
                  <input class="form-control" type="text" name="county" id="county" value="{{old('county')}}" placeholder="County">
                </div>
              </div>

              <div class="form-group row">
                <label for="postcode" class="col-md-3 col-form-label">Postcode:</label>
                <div class="col">
                  <input class="form-control" type="text" name="postcode" id="postcode" value="{{old('postcode')}}" placeholder="Postcode">
                </div>
              </div>

              <div class="form-group row">
                <label for="country" class="col-md-3 col-form-label">Country:</label>
                <div class="col">
                  <input class="form-control" type="text" name="country" id="country" value="United Kingdom" placeholder="Country" readonly>
                </div>
              </div>
            </div>
          </div>
