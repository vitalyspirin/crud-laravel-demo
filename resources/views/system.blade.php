
@extends('layout')

@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

    <pre>
{{ json_encode($info, JSON_PRETTY_PRINT) }}
    </pre>

<div>
@endsection
