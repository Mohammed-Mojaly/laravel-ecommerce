
@extends('layouts.admin-auth')
@section('content')

<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="row w-100 m-0">
    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
      <div class="card col-lg-4 mx-auto">
        <div class="card-body px-5 py-5">
          <h3 class="card-title text-left mb-3">Forgot Your Password?</h3>
          <p class="mb-4">
            Just enter your email address below
            and we'll send you a link to reset your password!
        </p>
          <form action="{{route('login')}}" method="POST" class="user">
            @csrf

            <div class="form-group">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user" placeholder="Enter Email Address...">
                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">
                Reset Password
            </button>

          </form>
          <div class="text-center">
            <a class="small" href="{{ route('admin.login') }}">Already have an account? Login!</a>
        </div>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection

