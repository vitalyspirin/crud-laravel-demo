
        @csrf
        <input type="hidden" name="user_id" id="user_id"
              value="{{ old('user_id', $user->user_id) }}" />

        <div class="form-group row">
          <div class="col-6">
            <label for="user_firstname">User First Name:</label>
            <input type="text" class="form-control" name="user_firstname" id="user_firstname"
              value="{{ old('user_firstname', $user->user_firstname) }}" />
          </div>

          <div class="col-6">
            <label for="user_lastname">User Last Name:</label>
            <input type="text" class="form-control" name="user_lastname" id="user_lastname"
              value="{{ old('user_lastname', $user->user_lastname) }}" />
          </div>
        </div>

        <div class="form-group row">

          <div class="col-6">
            <label for="user_email">User Email:</label>
            <input type="email" class="form-control" name="user_email" id="user_email"
              value="{{ old('user_email', $user->user_email) }}" />
          </div>
        </div>


        <div class="form-group row">
          <div class="col-6">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password"
              value="{{ old('password') }}" />
          </div>

          <div class="col-6">
            <label for="password_confirmation">Repeat Password:</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
              value="{{ old('password_confirmation') }}" />
          </div>
        </div>


        <a href="{{ route('users.index') }}" class="float-right font-weight-bold">Cancel</a>

        <button type="submit" id="submit-button" on click="ThumbnailForm.submit('user-form')" class="btn btn-primary">Submit</button>



