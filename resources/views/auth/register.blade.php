{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
<section class="login py-5 border-top-1 bg-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border border">
                    <h3 class="bg-gray p-4">Register Now</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <fieldset class="text-center p-4">
                            <input type="text" placeholder="Name*" required name="name" class="border p-3 w-100 my-2">
                            <input type="email" placeholder="Email*" required name="email" class="border p-3 w-100 my-2">
                            <input type="password" name="password" required placeholder="Password*" class="border p-3 w-100 my-2">
                            {{-- <input type="password" name="password_confirmation" placeholder="Confirm Password*" class="border p-3 w-100 my-2"> --}}
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
                            <!-- <div class="loggedin-forgot d-inline-flex my-3">
                                    <input type="checkbox" id="registering" class="mt-1">
                                    <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                            </div> -->
                            <button type="submit" class="py-3 px-4 bg-success text-white border-0 rounded font-weight-bold">Register Now</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
