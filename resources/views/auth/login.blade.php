@extends('layouts.pagesLayout')
@include('layouts.nav')

@section('content')

    <section class="container">
        <div class="inner">
            <div class="row">
                <div class="col-md-6">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>


                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                    </div>

                    <div class="form-group">

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                                Me
                            </label>
                        </div>

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary custom-button-for-forms">
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>

                    </div>
                </form>
            </div>
                <div class="col-md-6">
                    <div class="social-login-inner">
                        <div class="social-login-title">
                            <h3>Or Login With Your Social Account</h3>
                        </div>
                        <div class="social-login-body">
                            <a href="/login/facebook">
                                <i class="ti-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="ti-google"></i>
                            </a>
                            <a href="#">
                                <i class="ti-linkedin"></i>
                            </a>
                            <a href="#">
                                <i class="ti-google"></i>
                            </a>
                            <a href="#">
                                <i class="ti-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
