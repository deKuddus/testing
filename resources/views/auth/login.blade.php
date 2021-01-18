@extends('layouts.auth')

@section('title')
  {{systemInformation()->name}} | Log in
@endsection

@section('content')
<!-- /.login-logo -->
@include('errors.message')
  <div class="card">
    <div class="card-header">
        <h3 class="text-center"><strong>{{systemInformation()->name}}</strong></h3>
    </div>
    <div class="card-body login-card-body">
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"  placeholder="{{ __('Username') }}" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

          @error('username')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a class="btn btn-link" href="{{ URL::to('forget/password/request') }}">
          {{ __('Forgot Password?') }}
        </a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
@endsection
