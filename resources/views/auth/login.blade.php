@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row justify-content-center tab-pane in active">
            <div class="col-4">
              <div class="card-header">{{ __('Login') }}</div>
                <form class="form-horizontal" method="post" action="{{ route('login') }}">
                  @csrf
                    <div class="form-group " >
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>

                    </div>
                    <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-key"></i></div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="form-group row">
                            <div class="col-md">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>




                                    @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <input type="submit" value="Login" class="btn btn-success btn-custom">
                </form>
            </div>

    </div>

</div>
@endsection
