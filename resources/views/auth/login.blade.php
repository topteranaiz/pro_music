{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
</div>
@endsection --}}
@extends('template.master')
@section('content')
<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Login Now</h3>
                    <form method="POST" action="{{ route('post.login') }}">
                        @csrf
                        <fieldset class="text-center p-4">
                            <div class="row px-4">
                                <div class=" mr-lg-4 my-2 rounded">
                                    <input type="radio" name="type_personal_id" value="1" id="personal">
                                    <label for="personal" class="py-2">นักดนตรี</label>
                                </div>
                                <div class=" mr-lg-4 my-2 rounded ">
                                    <input type="radio" name="type_personal_id" value="2" id="business">
                                    <label for="business" class="py-2">สมาชิก</label>
                                </div>
                            </div>
                            <input type="text" required placeholder="Username" name="username" class="border p-3 w-100 my-2">
                            <input type="password" required placeholder="Password" name="password" class="border p-3 w-100 my-2">
                            <button type="submit" class="py-3 px-5 bg-success text-white border-0 rounded font-weight-bold mt-3">Log in</button>
                            <!-- <a class="mt-3 d-block  text-primary" href="#">Forget Password?</a> -->
                            <a class="mt-3 d-block text-primary" href="{{ route('register') }}"><button type="button" class="py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Register Now</button></a>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
