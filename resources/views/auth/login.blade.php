@extends('layouts.Navbarforlogin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                    <div class="card-header text-center">
                       <h3 class="my-3"> Yalla Netlob</h3>

                        {{-- <img class="card-img-top" src="images/Yalla Wide.png"/> --}}
                    </div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
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

                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <p class="text-muted m-0">don't have an account ??</p>
                            <a class="btn btn-link" href="{{ route('register') }}">Register here</a>
                        </div>
                        <div class="d-flex justify-content-center align-items-center my-4">
                            <hr class="m-auto  w-25 "> <span>Or</span>
                            <hr class="m-auto w-25 ">
                        </div>
                        <h5 class="text-center my-2 ">Sign-in with </h5>
                        <div class="d-flex justify-content-center mt-3">
                            <div class="text-center ">
                                <a href="/login/facebook" class=" btn btn-light m-auto ">
                                    <i class="fa-brands fa-facebook fa-2xl text-primary"></i></a>
                            </div>
                            <div class="text-center  mx-2  ">
                                <a href="/login/google" class=" btn btn-light m-auto ">
                                    {{-- <i class="fa-brands fa-google fa-2xl text-info"></i> --}}
                                    <svg xmlns="https://www.w3.org/2000/svg" width="28" height="24"
                                        viewBox="0 0 48 48" aria-hidden="true" class="L5wZDc">
                                        <path fill="#4285F4"
                                            d="M45.12 24.5c0-1.56-.14-3.06-.4-4.5H24v8.51h11.84c-.51 2.75-2.06 5.08-4.39 6.64v5.52h7.11c4.16-3.83 6.56-9.47 6.56-16.17z">
                                        </path>
                                        <path fill="#34A853"
                                            d="M24 46c5.94 0 10.92-1.97 14.56-5.33l-7.11-5.52c-1.97 1.32-4.49 2.1-7.45 2.1-5.73 0-10.58-3.87-12.31-9.07H4.34v5.7C7.96 41.07 15.4 46 24 46z">
                                        </path>
                                        <path fill="#FBBC05"
                                            d="M11.69 28.18C11.25 26.86 11 25.45 11 24s.25-2.86.69-4.18v-5.7H4.34C2.85 17.09 2 20.45 2 24c0 3.55.85 6.91 2.34 9.88l7.35-5.7z">
                                        </path>
                                        <path fill="#EA4335"
                                            d="M24 10.75c3.23 0 6.13 1.11 8.41 3.29l6.31-6.31C34.91 4.18 29.93 2 24 2 15.4 2 7.96 6.93 4.34 14.12l7.35 5.7c1.73-5.2 6.58-9.07 12.31-9.07z">
                                        </path>
                                        <path fill="none" d="M2 2h44v44H2z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
