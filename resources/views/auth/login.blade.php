@extends('layouts.auth')

@section('content')
<div class="d-flex flex-row-fluid w-lg-50 p-10 order-2 order-lg-1">
  <div class="d-flex flex-center flex-row-fluid">
    <div class="w-lg-500px w-100 p-10">
      <form class="form w-100" action="{{ route('login') }}" method="POST" id="loginForm">
        @csrf
        <div class="mb-11">
          <h1 class="text-gray-900 fw-bolder mb-3 fs-3qx">Sign-In</h1>
          <div class="text-gray-500 fw-semibold fs-5">Silahkan masuk untuk melanjutkan</div>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row align-items-center p-5 mb-10">
          <i class="ki-duotone ki-notification-bing fs-2hx text-success me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
          <div class="d-flex flex-column pe-0 pe-sm-10">
              <span>{{ session('success') }}</span>
          </div>
          <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
              <i class="ki-duotone ki-cross fs-1 text-success"><span class="path1"></span><span class="path2"></span></i>
          </button>
        </div>
        @elseif (session()->has('warning'))
        <div class="alert alert-dismissible bg-light-warning d-flex flex-column flex-sm-row align-items-center p-5 mb-10">
          <i class="ki-duotone ki-notification-bing fs-2hx text-warning me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
          <div class="d-flex flex-column pe-0 pe-sm-10">
              <span>{{ session('warning') }}</span>
          </div>
          <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
              <i class="ki-duotone ki-cross fs-1 text-warning"><span class="path1"></span><span class="path2"></span></i>
          </button>
        </div>
        @elseif (session()->has('error'))
        <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row align-items-center p-5 mb-10">
          <i class="ki-duotone ki-notification-bing fs-2hx text-danger me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
          <div class="d-flex flex-column pe-0 pe-sm-10">
              <span class="fw-semibold">{{ session('error') }}</span>
          </div>
          <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
              <i class="ki-duotone ki-cross fs-1 text-danger"><span class="path1"></span><span class="path2"></span></i>
          </button>
        </div>
        @endif

        <div class="fv-row mb-8">
          <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" value="{{ old('email') }}" />
          @error('email')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="fv-row mb-3">
          <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent @error('password') is-invalid @enderror" />
          @error('password')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
          <div></div>
          <a href="{{ route('forgot') }}" class="link-primary">Lupa Password ?</a>
        </div>
        <div class="d-grid mb-10">
          <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            <span class="indicator-label">Sign-in</span>
            <span class="indicator-progress" style="display: none;">Loading... 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
        </div>
        <div class="text-gray-500 text-center fw-semibold fs-6">Belum Memiliki akun?  
        <a href="{{ route('register') }}" class="link-primary">Sign-Up</a></div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  document.getElementById('loginForm').addEventListener('submit', function() {
    var submitButton = document.getElementById('kt_sign_in_submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
@endsection
