
@extends('layout')

@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

  <img src="/images/Hero.jpg" alt="" />

<div>
@endsection
