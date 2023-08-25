@extends('layouts.main')

@section('body-class', 'login-page')

@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Leave</b>Management</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <h4 class="login-box-msg">SING IN</h4>
  
        <form action="{{ route('login') }}" method="post">
            @csrf

          <!-- Email Address -->
          <p class="text-danger m-0">{{ $errors->first('email') }}</p>
          <div class="input-group mb-3">
            <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          

          <!-- Password -->
          <p class="text-danger m-0">{{ $errors->first('password') }}</p>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          

          <!-- Remember Me -->
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        @if (Route::has('password.request'))
        <p class="mb-1">
          <a href="{{ route('password.request') }}">Forgot your password?</a>
        </p>
        @endif
        <p class="mb-0">
          <a href="{{route('register')}}" class="text-center">Not registered yet?</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection