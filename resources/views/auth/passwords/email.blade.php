@extends('layouts.app')

@section('content')
    <div class="fixed-card">
        <div class="card-body mail">
            <div class="hdr text-center">
                <h4>{{__('Astore')}}</h4>
                <strong>{{ __('Reset Password') }}</strong>
            </div>

            <div class="form-card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="text-md-start">{{ __('Email Address') }}</label>

                        <div class="">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="xyz@example.com" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
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
