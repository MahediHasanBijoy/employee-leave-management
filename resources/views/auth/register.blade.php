@extends('layouts.main')

@section('body-class', 'register-page')

@section('content')
<div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Leave</b>Management</a>
    </div>
  
    <div class="card">
      <div class="card-body register-card-body">
        <h4 class="login-box-msg">REGISTER</h4>
  
        <form action="{{route('register')}}" method="post">
            @csrf

          <!-- Name -->
          <p class="text-danger m-0">{{ $errors->first('name') }}</p>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Full name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <!-- Email Address -->
          <p class="text-danger m-0">{{ $errors->first('email') }}</p>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required>
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

          <!-- Confirm Password -->
          <p class="text-danger m-0">{{ $errors->first('password_confirmation') }}</p>
          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-8">
                <a href="{{route('login')}}" class="text-center">Aready registered?</a>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>

@endsection