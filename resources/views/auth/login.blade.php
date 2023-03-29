@extends('layouts.app')

@section('content')
    <div class="fixed-card">
        <div class="card-body">
            <div class="hdr text-center">
                <h4>{{__('Astore')}}</h4>
                <strong>{{ __('Log in') }}</strong>
                <div>
                    <span>{{__('Need an account ?')}}</span>
                    <a href="{{ route('register') }}">{{__('Sign up')}}</a>
                </div>
            </div>

            <div class="form-card">
                <form method="POST" action="{{ route('login') }}" id="demo-form">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="text-md-end">{{ __('Email Address') }}</label>

                        <div class="">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="xyz@example.com"  autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="text-md-end">{{ __('Password') }}</label>

                        <div class="">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="--------" autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="">
                            <div>
                                @if (Route::has('password.request'))
                                    <a class="text-md-center" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <button class="btn btn-primary" type="submit">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <footer>
                @include('auth.footer')
            </footer>
        </div>
        
        <script>
            
        </script>
    </div>
@endsection
