
@extends('layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Edit User
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" id="user-form" action="{{ route('users.update', $user->user_id) }}" class="user edit">
        @method('PATCH')
        @include('users._form')
      </form>
  </div>
</div>
@endsection
