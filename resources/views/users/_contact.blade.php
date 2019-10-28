
          <div class="contact-section" id="contact-section-{{ $key + 1 }}">
            <span class="float-right delete-contact-section"
              onclick="Form.deleteSection('contact-section-{{ $key + 1 }}')">X</span>

            <div class="form-group row">
              <div class="col-2">
                <label>Default:
                  <input type="radio" class="contact_default" name="user_contact[contact_default]"
                    {!! ($contact['contact_default'] ? 'checked="checked"' : '') !!}
                    value="{{ $key + 1 }}" />
                </label>
              </div>

              <div class="col-4">
                <label class="w-100">Contact Type:
                  <input type="text" class="form-control contact_type" name="user_contact[{{$key + 1}}][contact_type]"
                    value="{{ old('contact_type' . ($key + 1), $contact['contact_type']) }}" />
                </label>
              </div>

              <div class="col-6">
                <label class="w-100">Contact Value:
                  <input type="text" class="form-control contact_value" name="user_contact[{{$key + 1}}][contact_value]"
                    value="{{ old('contact_value' . ($key + 1), $contact['contact_value']) }}" />
                </label>
              </div>
            </div>
          </div>
