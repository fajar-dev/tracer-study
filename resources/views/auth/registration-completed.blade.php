@extends('layouts.auth')
@section('content')
<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
  <div class="d-flex flex-center flex-column flex-lg-row-fluid">
    <div class="w-lg-500px w-100 p-10">
      <form class="form w-100" action="{{ route('registration.completed.submit') }}" method="POST" id="loginForm" enctype="multipart/form-data">
        @csrf
        <div class="mb-11">
          <h1 class="text-gray-900 fw-bolder mb-3 fs-3qx">Registration</h1>
          <div class="text-gray-500 fw-semibold fs-5">Lengkapi data diri anda</div>
        </div>
        <div class="fv-row mb-10">
          <label class="d-block fw-semibold fs-6 mb-5">
            <span class="required">Foto</span>
          </label>
          <style>.image-input-placeholder { background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('{{ asset('assets/media/svg/files/blank-image-dark.svg') }}'); }</style>
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
        <div class="fv-row mb-5">
          <input type="text" placeholder="Nama Lengkap" name="name" autocomplete="off" class="form-control bg-transparent @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" />
          @error('name')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <!--end::Input group-->
        <div class="fv-row mb-5">
          <input type="number" placeholder="NISN" name="student_identity_number" autocomplete="off" class="form-control bg-transparent @error('student_identity_number') is-invalid @enderror" value="{{ old('student_identity_number') }}" />
          @error('student_identity_number')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="fv-row mb-5">
          <input type="text" placeholder="Kelas (mis: XII)" name="class" autocomplete="off" class="form-control bg-transparent @error('class') is-invalid @enderror" value="{{ old('class') }}" />
          @error('class')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="fv-row mb-5">
          <input type="text" placeholder="Jurusan (mis: IPA)" name="major" autocomplete="off" class="form-control bg-transparent @error('major') is-invalid @enderror" value="{{ old('major') }}" />
          @error('major')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="fv-row mb-5">
          <input type="text" id="birthDateInput" placeholder="Tanggal Lahir" name="birth_date" autocomplete="off" class="form-control bg-transparent @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" onfocus="(this.type='date')" onblur="(this.type='text')" />
          @error('birth_date')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>        
        <div class="fv-row mb-5">
          <input type="text" placeholder="Hobi (mis: Membaca)" name="hobby" autocomplete="off" class="form-control bg-transparent @error('hobby') is-invalid @enderror" value="{{ old('hobby') }}" />
          @error('hobby')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        
        <div class="d-grid mb-10">
          <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            <span class="indicator-label">Submit</span>
            <span class="indicator-progress" style="display: none;">Loading... 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
        </div>
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
