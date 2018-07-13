@extends('layouts.pagesLayout')
@include('layouts.nav')

@section('content')
    <section class="container">
        <div class="inner">
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>


                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif

                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>


                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                       required>

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
                            <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>


                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>

                        </div>
                        <div class="form-group">

                                <button type="submit" class="btn custom-button-for-forms">
                                    Register
                                </button>
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
