@extends('layouts.app')

@section('content')
<form action="{{ route('admin.survey.store') }}" enctype="multipart/form-data" method="post" id="form" class="row g-5 g-xl-8 justify-content-center">
  @csrf
  <div class="col-xl-9 mb-8">
    <div class="row">
      <div class="card card-flush">
        <div class="card-body pt-0">
          <div class="mb-3 mt-9">
            <label for="exampleFormControlInput1" class="col-form-label fw-bold fs-6">Thumbnail</label>
            <div>
              <div class="image-input image-input-empty" data-kt-image-input="true">
                <div class="image-input-wrapper w-200px h-150px bg-" style="background-image: url('{{ asset('app/media/svg/files/blank-image.svg') }}')"></div>
                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change thumbnail">
                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>
                    <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
                </label>
                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel thumbnail">
                    <i class="ki-outline ki-cross fs-3"></i>
                </span>
                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove thumbnail">
                    <i class="ki-outline ki-cross fs-3"></i>
                </span>
              </div>
            </div>
              @error('thumbnail')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              <div class="text-muted fs-7 pt-3"> Only *.png, *.jpg and *.jpeg image files are accepted <br>Max 2mb</div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="col-form-label required fw-bold fs-6">Title</label>
            <input type="text" name="title" class="form-control form-control-solid @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Report title" required/>
            @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3 d-flex">
            <div>
              <label for="exampleFormControlInput1" class="col-form-label fw-bold fs-6">Active</label>
              <div class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" name="is_active" @if (old('isActive')) checked @endif id="flexSwitchDefault"/>
              </div>
            </div>
            <div class="ms-10">
              <label for="exampleFormControlInput1" class="col-form-label fw-bold fs-6">Private</label>
              <div class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" name="is_private" @if (old('isPrivate')) checked @endif id="flexSwitchDefault"/>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="col-form-label required fw-bold fs-6">Content</label>
            <textarea name="description" id="kt_docs_ckeditor_classic" required>
              {{ old('description') }}
            </textarea>
            @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="d-flex justify-content-end">
            <a href="{{ route('admin.survey') }}" class="btn btn-light-primary me-3">Cancel</a>
            <button type="submit" id="submit" class="btn btn-primary">
              <span class="indicator-label">Next</span>
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