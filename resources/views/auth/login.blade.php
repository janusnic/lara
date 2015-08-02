<!-- resources/views/auth/login.blade.php -->
@extends('layouts.cms')

@section('content')
  <div class="container-fluid">
    
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Login</div>
              <div class="panel-body">

            @include('cms.partials.errors')

                <form class="form-horizontal" role="form" method="POST"
                      action="{{ url('/auth/login') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                  <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail Address</label>
                    <div class="col-md-6">
                      <input type="email" class="form-control" name="email"
                             value="{{ old('email') }}" autofocus>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-6">
                      <input type="password" class="form-control" name="password">
                    </div>
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
                    </div>
                  </div>

              </div>

            
                 <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 social-login">
                                    <h3>...or login with:</h3>
                                    <div class="social-login-buttons">
                                        <a class="btn btn-lg btn-primary btn-block facebook" type="submit" href="/social/redirect/facebook">
                                            <i class="fa fa-facebook"></i> Facebook
                                        </a>
                                        <a class="btn btn-lg btn-primary btn-block twitter" type="submit" href="/social/redirect/twitter">
                                            <i class="fa fa-twitter"></i> Twitter
                                        </a>
                                        <a class="btn btn-lg btn-primary btn-block google-plus" type="submit"  href="/sauth/google">
                                            <i class="fa fa-google-plus"></i> Google Plus
                                        </a>
                                        <a class="btn btn-lg btn-primary btn-block github" type="submit"  href="/sauth/github">
                                            <i class="fa fa-google-plus"></i> Github
                                        </a>
                                    </div>
                    </div>
                 </div>        

              </form>
          </div>
        
      </div>
    </div>
  </div>
@endsection