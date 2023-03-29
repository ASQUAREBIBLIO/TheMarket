@extends('layouts.app')

@section('content')
    <div class="fixed-card">
        <div class="card-body">
            <div class="hdr text-center">
                <h4>{{__('Astore')}}</h4>
                <strong>{{ __('Confirm Password') }}</strong>
            </div>

            <div class="form-card">
                {{ __('Please confirm your password before continuing.') }}

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="password" class="text-md-start">{{ __('Password') }}</label>

                        <div class="">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="--------" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="">
                            <div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <footer>
                @include('auth.footer')
            </footer>
        </div>
    </div>
@endsection
