@extends('layouts.pagesLayout')
@include('layouts.nav')

@section('content')
    <section class="container">
        <div class="inner">
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @elseif(session('badStatus'))
                    <div class="alert alert-danger">
                        {{ session('badStatus') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                              action="{{ route('accountEditAction') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="user-avatar-container">
                                    <span>
                                        <img src="{{ asset("storage/".
                                        \Illuminate\Support\Facades\Auth::user()->avatar) }}" alt="">
                                    </span>
                                    <label for="avatar">New Avatar <i class="fas fa-upload"></i></label>
                                    <input type="file" style="display: none" name="avatar" id="avatar">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">New Name</label>


                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('name ') }}</strong>
                                            </span>
                                @endif

                            </div>


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">New Email</label>


                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                @endif

                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Current Password</label>

                                <input id="password" type="password" class="form-control" name="password"
                                required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn custom-button-for-forms">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h4><a href="/change-current-password" onclick="event.preventDefault();document.getElementById('change-password-form').submit();">Change Current Password</a>

                            <form id="change-password-form" action="{{ route('changePassword') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </h4>


                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
