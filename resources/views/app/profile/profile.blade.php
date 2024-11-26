@extends('layouts.app')

@section('content')
  <div class="row g-5 g-xl-10">
    <div class="col-xl-12 mb-8">
      <div class="card card-flush mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer">
          <div class="card-title m-0">
            <h3 class="fw-bold m-0">Profil Saya</h3>
          </div>
        </div>
        <div>
          <form method="POST" id="form" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="form">
            @csrf
            <div class="card-body border-top p-9">
              <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Foto</label>
                <div class="col-lg-8 fv-row">
                  <style>.image-input-placeholder { background-image: url("{{ Auth::user()->photo_path ? Storage::url(Auth::user()->photo_path) : 'https://ui-avatars.com/api/?background=DFFFEA&color=04B440&bold=true&name='.Auth::user()->name }}"); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('{{ Auth::user()->photo_path ? Storage::url(Auth::user()->photo_path) : asset("assets/media/svg/files/blank-image-dark.svg")}}'); }</style>
                  <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
                    <div class="image-input-wrapper w-125px h-125px"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                      <i class="ki-outline ki-pencil fs-7"></i>
                      <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                      <input type="hidden" name="avatar_remove" />
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                      <i class="ki-outline ki-cross fs-2"></i>
                    </span>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                      <i class="ki-outline ki-cross fs-2"></i>
                    </span>
                  </div>
                  <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                  @error('photo')
                  <div class="text-sm text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama</label>
                <div class="col-lg-8 fv-row">
                  <input type="text" name="name" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" value="{{ old('name') ?? Auth::user()->name }}" />
                  @error('name')
                  <div class="text-sm text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
              <button type="submit" id="submit" class="btn btn-primary">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress" style="display: none;">Loading... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
          <div class="card-title m-0">
            <h3 class="fw-bold m-0">Sign-in Method</h3>
          </div>
        </div>
        <div id="kt_account_settings_signin_method" class="collapse show">
          <div class="card-body border-top p-9">
            <div class="d-flex flex-wrap align-items-center">
              <div id="kt_signin_email">
                <div class="fs-6 fw-bold mb-1">Email</div>
                <div class="fw-semibold text-gray-600">{{ Auth::user()->email }}</div>
              </div>
              <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                <form action="{{ route('admin.profile.signin') }}" id="formSignin" method="POST" class="form">
                  @csrf
                  <div class="row mb-6">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                      <div class="fv-row mb-0">
                        <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Email</label>
                        <input type="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" id="emailaddress" placeholder="Email Address" name="email" value="{{ old('email') ?? Auth::user()->email }}" />
                        @error('email')
                        <div class="text-sm text-danger">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button type="submit" id="submitSignin" class="btn btn-primary">
                      <span class="indicator-label">Simpan</span>
                      <span class="indicator-progress" style="display: none;">Loading... 
                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                  </div>
                </form>
              </div>
              <div id="kt_signin_email_button" class="ms-auto">
                <button class="btn btn-light btn-active-light-primary">Ubah</button>
              </div>
            </div>
            <div class="separator separator-dashed my-6"></div>
            <div class="d-flex flex-wrap align-items-center mb-10">
              <div id="kt_signin_password">
                <div class="fs-6 fw-bold mb-1">Password</div>
                <div class="fw-semibold text-gray-600">************</div>
              </div>
              <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                <form id="formPassword" method="POST" action="{{ route('admin.profile.change-password') }}" class="form">
                  @csrf
                  <div class="row mb-6">
                    <div class="col-lg-6">
                      <div class="fv-row mb-0">
                        <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                        <input type="password" class="form-control form-control-lg form-control-solid @error('oldpassword') is-invalid @enderror" name="oldPassword" id="currentpassword" />
                        @error('oldpassword')
                        <div class="text-sm text-danger">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="fv-row mb-0">
                        <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                        <input type="password" class="form-control form-control-lg form-control-solid @error('newPassword') is-invalid @enderror" name="newPassword" id="newpassword" />
                        @error('newPassword')
                        <div class="text-sm text-danger">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button type="submit" id="submitPassword" class="btn btn-primary">
                      <span class="indicator-label">Simpan</span>
                      <span class="indicator-progress" style="display: none;">Loading... 
                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>             
                   <button id="kt_password_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                  </div>
                </form>
              </div>
              <div id="kt_signin_password_button" class="ms-auto">
                <button class="btn btn-light btn-active-light-primary">Ubah</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script src="{{ asset('app/js/custom/account/settings/signin-methods.js') }}"></script>
<script>
  document.getElementById('form').addEventListener('submit', function() {
    var submitButton = document.getElementById('submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
<script>
  document.getElementById('formSignin').addEventListener('submit', function() {
    var submitButton = document.getElementById('submitSignin');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
<script>
  document.getElementById('formPassword').addEventListener('submit', function() {
    var submitButton = document.getElementById('submitPassword');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
@endsection
