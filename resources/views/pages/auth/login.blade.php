@extends('layout.master2')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-8 pr-md-0">
                            <div class="auth-left-wrapper"
                                 style="background-image: url({{ asset('assets/images/logo-mockup.jpg') }})">
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo logo-light d-block mb-2 text-center">
                                    <img src="{{ asset('assets/images/login.png')}}" alt="">
                                </a>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group @error('email') has-danger @enderror">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <label id="name-error" class="error mt-2 text-danger"
                                               for="email">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('password') has-danger @enderror">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control id="password" name="password"
                                        autocomplete="current-password" placeholder="Password" required>
                                        @error('password')
                                        <label id="name-error" class="error mt-2 text-danger"
                                               for="password">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <button type="submit"
                                                class="btn btn-primary mr-2 mb-2 mb-md-0">{{ __('Login') }}</button>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="d-block mt-3 text-muted" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
