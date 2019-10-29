
          <div class="address-section" id="address-section-{{ $key + 1 }}">
            <span class="float-right delete-address-section"
              onclick="Form.deleteSection('address-section-{{ $key + 1 }}')">X</span>

            <div class="form-group row">
              <div class="col-2">
                <label>Default:
                  <input type="radio" class="address_default" name="user_address[address_default]"
                    {!! ($address['address_default'] ? 'checked="checked"' : '') !!}
                    value="{{ $key + 1 }}" />
                </label>
              </div>

              <div class="col-3">
                <label class="w-100">Address Type:
                  <input type="text" class="form-control address_type" name="user_address[{{$key + 1}}][address_type]"
                    value="{{ old('address_type' . ($key + 1), $address['address_type']) }}" />
                </label>
              </div>

              <div class="col-4">
                <label class="w-100">Address Street:
                  <input type="text" class="form-control address_street" name="user_address[{{$key + 1}}][address_street]"
                    value="{{ old('address_street' . ($key + 1), $address['address_street']) }}" />
                </label>
              </div>

              <div class="col-3">
                <label class="w-100">Address City:
                  <input type="text" class="form-control address_city" name="user_address[{{$key + 1}}][address_city]"
                    value="{{ old('address_city' . ($key + 1), $address['address_city']) }}" />
                </label>
              </div>
            </div>


            <div class="form-group row">
              <div class="col-4">
                <label class="w-100">Address Province:
                  <input type="text" class="form-control address_province" name="user_address[{{$key + 1}}][address_province]"
                    value="{{ old('address_province' . ($key + 1), $address['address_province']) }}" />
                </label>
              </div>

              <div class="col-4">
                <label class="w-100">Address Country:
                  <input type="text" class="form-control address_country" name="user_address[{{$key + 1}}][address_country]"
                    value="{{ old('address_country' . ($key + 1), $address['address_country']) }}" />
                </label>
              </div>

              <div class="col-4">
                <label class="w-100">Address Postal Code:
                  <input type="text" class="form-control address_postal" name="user_address[{{$key + 1}}][address_postal]"
                    value="{{ old('address_postal' . ($key + 1), $address['address_postal']) }}" />
                </label>
              </div>
            </div>
          </div>
