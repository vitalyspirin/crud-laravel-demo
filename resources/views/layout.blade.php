<!DOCTYPE html>

@php
  $title = 'Relax CMS';

  if (stripos(request()->getHost(), 'dev') !== false) {
    $title .= ' Dev';
  }

@endphp
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$title}}</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/my.css') }}" rel="stylesheet" type="text/css" />

  <script src="{{ asset('js/app.js') }}"></script>


  <link href="{{ url('/js/select2/select2.min.css')}}" rel="stylesheet" />
  <script src="{{ url('/js/select2/select2.min.js')}}"></script>

</head>
<body>
  <div class="container">
    <header class="row">
      @if(optional(Route::current())->getName() !== 'login')
        @include('header')
      @endif
    </header>

    @yield('content')
  </div><!-- class="container" -->


</body>
</html>
