
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


        @foreach ($user->user_contact as $contact)
            <hr class="row" />

            <div class="form-group row">
              <div class="col-2">
                <label>Default:
                  <input type="radio" class="form-control" name="user_contact[contact_default]"
                    {{ ($contact['contact_default'] ? 'checked="checked"' : '') }}
                    value="{{ $loop->iteration }}" />
                </label>
              </div>

              <div class="col-4">
                <label class="w-100">Contact Type:
                  <input type="text" class="form-control" name="user_contact[{{$loop->iteration}}][contact_type]"
                    value="{{ old('contact_type' . $loop->iteration, $contact['contact_type']) }}" />
                </label>
              </div>

              <div class="col-6">
                <label class="w-100">Contact Value:
                  <input type="text" class="form-control" name="user_contact[{{$loop->iteration}}][contact_value]"
                    value="{{ old('contact_value' . $loop->iteration, $contact['contact_value']) }}" />
                </label>
              </div>
            </div>
        @endforeach

        <a href="{{ route('users.index') }}" class="float-right font-weight-bold">Cancel</a>

        <button type="submit" id="submit-button" on click="ThumbnailForm.submit('user-form')" class="btn btn-primary">Submit</button>



