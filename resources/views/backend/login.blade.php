
@extends('layouts.admin-auth')
@section('content')

<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="row w-100 m-0">
    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
      <div class="card col-lg-4 mx-auto">
        <div class="card-body px-5 py-5">
          <h3 class="card-title text-left mb-3">Login</h3>
          <form action="{{route('login')}}" method="POST" class="user">
            @csrf
            <div class="form-group">
              <label>Username or email *</label>
              <input type="text" name="username" value="{{old('username')}}" class="form-control p_input">
              @error('username') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
              <label>Password *</label>
              <input type="password" name="password" class="form-control p_input">
              @error('password') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group d-flex align-items-center justify-content-between">
              <div class="form-check">
                  <label class="form-check-label" for="remember">Remember Me

                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    </label>
                {{-- <label class="form-check-label">

                  <input type="checkbox" name="remember" class="form-check-input" {{old('remember') ? 'checked' : ''}}> Remember me </label> --}}
              </div>
              <a href="{{ route('admin.forgot_password') }}" class="forgot-pass">Forgot password</a>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
            </div>


          </form>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection

