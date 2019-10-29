
@extends('layout')

@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

  @if (Request::segment(2) == '')
    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Create User</a>
  @endif

  <table class="table table-striped">
    <thead>
        <tr class="font-weight-bold">
          <th>User ID</th>
          <th>User First Name</th>
          <th>User Last Name</th>
          <th>User Email</th>
          <th colspan="4">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="{{ ($user->user_isenabled ? 'text-dark' : 'text-muted') }}">
            <td>{{$user->user_id}}</td>
            <td>{{$user->user_firstname}}</td>
            <td>{{$user->user_lastname}}</td>
            <td>{{$user->user_email}}</td>


              <td><a href="{{ route('users.show', $user->user_id)}}" class="btn btn-info">View</a></td>
              <td>
                  @if ($user->user_isenabled)
                    <form action="{{ route('users.disable', $user->user_id)}}" method="post">
                      @csrf
                      <button id="disable-button-for-user-id-{{$user->user_id}}" class="btn btn-warning" type="submit"
                        onclick="return confirm('You are about to DISABLE user \'{{$user->user_email}}\'')">Disable</button>
                    </form>
                  @else
                    <form action="{{ route('users.enable', $user->user_id)}}" method="post">
                      @csrf
                      <button id="enable-button-for-user-id-{{$user->user_id}}" class="btn btn-warning" type="submit"
                        onclick="return confirm('You are about to ENABLE user \'{{$user->user_email}}\'')">Enable</button>
                    </form>
                  @endif
              </td>
              <td><a href="{{ route('users.edit', $user->user_id)}}" class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('users.destroy', $user->user_id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button id="delete-button-for-user-id-{{$user->user_id}}" class="btn btn-danger" type="submit"
                      onclick="return confirm('You are about to DELETE user \'{{$user->user_email}}\'')">Delete</button>
                  </form>
              </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
