@extends('layouts.app')

@section('content')
    <div class="fixed-card">
        <div class="card-body sign">
            <div class="hdr text-center">
                <h4>{{__('Astore')}}</h4>
                <strong>{{ __('Become a publisher') }}</strong>
                <div>
                    <span>{{__('Already signed up ?')}}</span>
                    <a href="{{ route('login') }}">{{__('Log in')}}</a>
                </div>
            </div>

            <div class="form-card">
                <form method="POST" action="{{ route('register') }}" id="demo-form">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="text-md-start">{{ __('Name') }}</label>

                        <div class="">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ach-chatibi Ahmed" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="text-md-start">{{ __('Username') }}</label>

                        <div class="">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="A-Za-z0-9" autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="text-md-start">{{ __('Email Address') }}</label>

                        <div class="">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="xyz@example.com" autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="text-md-start">{{ __('Password') }}</label>

                        <div class="">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="--------" autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="text-md-start">{{ __('Confirm Password') }}</label>

                        <div class="">
                            <input id="password-confirm" type="password" class="form-control" name="password-confirm" placeholder="--------" autocomplete="new-password">
                            
                            @error('password-confirm')
                            <span class="invalid-feedback text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="">
                            <button class="btn btn-primary" type="submit">
                                {{ __('Register') }}
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
