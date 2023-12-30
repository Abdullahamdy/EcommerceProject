@extends('layouts.app')

@section('content')

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Register</h1>
                </div>
                <div class="col-lg-6 text-lg-end">

                </div>
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="row">
            <div class="col-6 offset-3">
                <h2 class="h5 text-uppercase mb-4">{{__('Register')}}</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">

                                <label for="first_name" class="text-small text-uppercase mb-2">First Name</label>


                                <input id="first_name" type="text" class=" form-control form-control-lg mb-3" name="first_name"
                                       value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>

                        </div>
                        <div class="col-12">
                            <div class="form-group">

                                <label for="last_name" class="text-small text-uppercase mb-2">Last Name</label>


                                <input id="first_name" type="text" class=" form-control form-control-lg mb-3" name="last_name"
                                       value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>

                        </div>
                        <div class="col-12">
                            <div class="form-group">

                                <label for="username" class="text-small text-uppercase mb-2">User Name</label>


                                <input id="username" type="text" class=" form-control form-control-lg mb-3" name="username"
                                       value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>

                        </div>


                        <div class="col-12">
                            <div class="form-group">

                                <label for="mobile" class="text-small text-uppercase mb-2">mobile</label>


                                <input id="mobile" type="text" class=" form-control form-control-lg mb-3" name="mobile"
                                       value="{{ old('mobile') }}" required autocomplete="last_name" autofocus>

                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>

                        </div>
                        <div class="col-12">
                        <div class="form-group">

                                <label for="email" class="text-small text-uppercase mb-2">email</label>


                                <input id="email" type="email" class=" form-control form-control-lg mb-3" name="email"
                                       value="{{ old('mobile') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>

                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="password" class="text-small text-uppercase mb-2">Password</label>


                                <input id="password" type="password" class="form-control form-control-lg mb-2" name="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="password_confirmation" class="text-small text-uppercase mb-2">Password</label>


                                <input id="password" type="password" class="form-control form-control-lg mb-2" name="password_confirmation">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="col-lg-6 form-group">
                            <div class="custom-control custom-checkbox">

                                <input class="custom-control-input mb-4" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="custom-control-label text-small" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>




                        <div class="col-12">
                            <div class=" form-group">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Register') }}
                                </button>

                                @if (Route::has('login'))
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Have an account') }}
                                    </a>
                                @endif


                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
