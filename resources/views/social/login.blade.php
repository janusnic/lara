@extends('layouts.front')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 form-box">
                <div class="form-top">
                    <div class="form-top-left">
                        <h3>Login to our site</h3>
                         <p>Enter your username and password to log on:</p>
                           @if (Session::get('session'))
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                            <li>{{ Session::get('session') }}</li>
                                    </ul>
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    </div>
                    
                <div class="form-top-right">
                     <i class="fa fa-key"></i>
                </div>
                </div>
                <div class="form-bottom">
                    <form role="form" method="POST" action="{{ url('/login') }}" class="login-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="sr-only" for="email">E-Mail Address</label>
                            <input type="email" placeholder="User E-Mail Address..." class="form-username form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="password">Password</label>
                            <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                                <a class="btn btn-link" href="{{ url('/auth/register') }}">Register an account</a>
                            </div>
                        </div>
                    </form>

                 </div>
            </div>
        </div>
         <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                            <h3>...or login with:</h3>
                            <div class="social-login-buttons">
                                <a class="btn btn-link-1 btn-link-1-facebook" href="/sauth/facebook">
                                    <i class="fa fa-facebook"></i> Facebook
                                </a>
                                <a class="btn btn-link-1 btn-link-1-twitter" href="/sauth/twitter">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                                <a class="btn btn-link-1 btn-link-1-google-plus" href="/sauth/google">
                                    <i class="fa fa-google-plus"></i> Google Plus
                                </a>
                                <a class="btn btn-link-1 btn-link-1-github" href="/sauth/github">
                                    <i class="fa fa-google-plus"></i> Github
                                </a>
                            </div>
                        </div>
        </div>




    </div>
</div>
@stop