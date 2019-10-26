
@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    View User
  </div>
  <div class="card-body">

    <dl>
        <div class="form-group row">
            <dt>User First Name</dt>:
            <dd>{{$user->user_firstname}}</dd>
        </div>

        <div class="form-group row">
            <dt>User Last Name</dt>:
            <dd>{{$user->user_lastname}}</dd>
        </div>

        <div class="form-group row">
            <dt>User Email</dt>:
            <dd>{{$user->user_email}}</dd>
        </div>

        <div class="form-group row">
            <dt>User Enabled</dt>:
            <dd>{{ ($user->user_isenabled ? 'Yes' : 'No')}}</dd>
        </div>
    </dl>

    @foreach ($user->user_address as $address)
        <hr class="row" />
        <dl>
            <div class="form-group row">
                <dt>{{ $address['address_type'] . ' address'. ($address['address_default'] ? ' (default)' : '') }}</dt>:
                <dd>{{ \App\User::getAddressString($address) }}</dd>
            </div>
        </dl>
    @endforeach

    @foreach ($user->user_contact as $contact)
        <hr class="row" />
        <dl>
            <div class="form-group row">
                <dt>Contact {{ $contact['contact_type'] . ($contact['contact_default'] ? ' (default)' : '') }}</dt>:
                <dd>{{ $contact['contact_value'] }}</dd>
            </div>
        </dl>

    @endforeach


    <a href="{{ route('users.index') }}" class="btn btn-primary">Go to User's List</a>


  </div>
</div>
@endsection
