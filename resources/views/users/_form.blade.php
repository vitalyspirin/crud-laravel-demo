
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

        <div id="contact-section-list">
          <input type="hidden" name="user_contact[contact_default]" value="-1" />
          <input type="hidden" id="user_contact_max_index" value="{{ count($user->user_contact) }}" />

          <template id="contact-template">
            @include('users._contact', [
              'key' => -1,
              'contact' => ['contact_default' => '', 'contact_type' => '', 'contact_value' => '']
            ])
          </template>

          @each('users._contact', $user->user_contact, 'contact')
        </div>

        <button type="button" class="btn btn-light" onclick="Form.addContactSection()">Add Contact</button>

        <hr />

        <div id="address-section-list">
          <input type="hidden" name="user_address[address_default]" value="-1" />
          <input type="hidden" id="user_address_max_index" value="{{ count($user->user_address) }}" />

          <template id="address-template">
            @include('users._address', [
              'key' => -1,
              'address' => [
                'address_default' => '',
                'address_type' => '',
                'address_street' => '',
                'address_city' => '',
                'address_province' => '',
                'address_country' => '',
                'address_postal' => ''
              ]
            ])
          </template>

          @each('users._address', $user->user_address, 'address')
        </div>

        <button type="button" class="btn btn-light" onclick="Form.addAddressSection()">Add Address</button>

        <hr />

        <a id="cancel-button" href="{{ route('users.index') }}" class="float-right font-weight-bold">Cancel</a>

        <button type="submit" id="submit-button" class="btn btn-primary">Submit</button>


<script>
  class Form {
    static deleteSection(sectionId) {
      const section = document.getElementById(sectionId);
      section.style.display = "none";

      const inputList = section.querySelectorAll('input');
      inputList.forEach((inputElement) => {
        inputElement.disabled = true;
      })

    }

    static addContactSection() {
      const index = 1 + parseInt(document.getElementById('user_contact_max_index').value);

      const contactTemplate = document.getElementById('contact-template');
      const newContactSection = document.importNode(contactTemplate.content, true);

      newContactSection.querySelector('input.contact_default').value = index;
      newContactSection.querySelector('input.contact_type').name = 'user_contact[' + index + '][contact_type]';
      newContactSection.querySelector('input.contact_value').name = 'user_contact[' + index + '][contact_value]';


      document.getElementById('contact-section-list').appendChild(newContactSection);

      document.getElementById('user_contact_max_index').value = index;
    }

    static addAddressSection() {
      const index = 1 + parseInt(document.getElementById('user_address_max_index').value);

      const addressTemplate = document.getElementById('address-template');
      const newAddressSection = document.importNode(addressTemplate.content, true);

      newAddressSection.querySelector('input.address_default').value = index;
      newAddressSection.querySelector('input.address_type').name = 'user_address[' + index + '][address_type]';
      newAddressSection.querySelector('input.address_street').name = 'user_address[' + index + '][address_street]';
      newAddressSection.querySelector('input.address_city').name = 'user_address[' + index + '][address_city]';
      newAddressSection.querySelector('input.address_province').name = 'user_address[' + index + '][address_province]';
      newAddressSection.querySelector('input.address_country').name = 'user_address[' + index + '][address_country]';
      newAddressSection.querySelector('input.address_postal').name = 'user_address[' + index + '][address_postal]';


      document.getElementById('address-section-list').appendChild(newAddressSection);

      document.getElementById('user_address_max_index').value = index;
    }
  }
</script>