@extends('layouts.app')

@section('content')
<form action="{{ route('admin.report.store') }}" enctype="multipart/form-data" method="post" id="form" class="row g-5 g-xl-8 justify-content-center">
  @csrf
  <div class="col-xl-9 mb-8">
    <div class="row">
      <div class="card card-flush">
        <div class="card-body pt-0">
          <div class="mb-3 mt-9">
            <label for="exampleFormControlInput1" class="col-form-label required fw-bold fs-6">Title</label>
            <input type="text" name="title" class="form-control form-control-solid @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Report title" required/>
            @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="col-form-label required fw-bold fs-6">File</label>
            <input type="file" name="file" class="form-control form-control-solid @error('file') is-invalid @enderror" required/>
            @error('file')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="col-form-label required fw-bold fs-6">Content</label>
            <textarea name="content" id="kt_docs_ckeditor_classic" required>
              {{ old('content') }}
            </textarea>
            @error('content')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="d-flex justify-content-end">
            <a href="{{ route('admin.report') }}" class="btn btn-light-primary me-3">Cancel</a>
            <button type="submit" id="submit" class="btn btn-primary">
              <span class="indicator-label">Submit</span>
              <span class="indicator-progress" style="display: none;">Loading... 
              <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection
@section('script')
<script src="{{ asset('app/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<script>
  document.querySelectorAll('form').forEach(function(form) {
    form.addEventListener('submit', function(event) {
      var submitButton = form.querySelector('button[type="submit"]');
      submitButton.querySelector('.indicator-label').style.display = 'none';
      submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
      submitButton.setAttribute('disabled', 'disabled');
    });
  });
</script>
<script>
  ClassicEditor
    .create(document.querySelector('#kt_docs_ckeditor_classic'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endsection