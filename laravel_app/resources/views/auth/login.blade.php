@extends('auth.auth')

@section('content')

    <div class="container-fluid d-flex align-items-center"
         style="min-height: 70vh; background: url({{asset('_img/beach-832346_1920.jpg')}}) center;">
        <div class="f-row" style="width: 100%">
            <div class="card m-0-auto" style=" min-height: 40vh;  width: 100%; max-width: 400px;">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" novalidate="novalidate">
                        {{csrf_field()}}
                        <div class="form-group f-row flex-column justify-content-center">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required
                                       autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group f-row justify-content-center">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" placeholder="{{ __('Password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group f-row">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group f-row mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="text-center mb-2"><a href="{{route('register')}}">Don't have an account yet? click here</a></div>
            </div>
        </div>

    </div>


@endsection
