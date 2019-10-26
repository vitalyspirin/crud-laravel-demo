<!DOCTYPE html>
<!-- url={{ url()->full() }} -->
<!--
@php
  var_dump(request()->all());
@endphp
-->
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


  <a href="http://validator.w3.org/check?uri=referer"
    onclick="this.href='http://validator.w3.org/check?uri='+ encodeURIComponent(document.URL +'?test')" id="html5-validator-link">
    <img src="https://www.w3.org/html/logo/downloads/HTML5_Logo_64.png" alt="Valid HTML 5!" height="64" width="64" />
  </a>



</body>
</html>
