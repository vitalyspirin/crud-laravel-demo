@extends('layout')

@section('content')

<div class="row justify-content-center min-vh-100">
    <div class="col-md-8 my-auto pb-5">
        <div class="card">
            <div class="card-header">{{ __('Login into Trainium') }}</div>

            <div class="card-body">
                <form id="login-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="user_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="user_email" type="email" name="user_email" required autofocus
                                value="{{ old('user_email', app('request')->input('user_email')) }}"
                                class="form-control{{ $errors->has('user_email') ? ' is-invalid' : '' }}" />

                            @if ($errors->has('user_email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" id="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
