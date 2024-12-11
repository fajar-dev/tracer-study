@extends('layouts.app')

@section('content')
<form action="{{ route('admin.survey.create-form.submit', $survey->id) }}" enctype="multipart/form-data" method="post" id="form" class="row g-5 g-xl-8 justify-content-center">
  @csrf
  <div class="col-xl-12 mb-8">
    <div class="row">
      <div class="card card-flush">
        <div class="card-header">
          <div class="card-title">
            <h3 class="card-title align-items-start flex-column">
              <span class="card-label fw-bold fs-3 mb-1">Create Form</span>
              <span class="text-muted fw-semibold fs-7">{{ $survey->title }}</span>
            </h3>
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="mb-3">
            <div class="create-form"> 
              <div id="fb-editor"></div>
            </div>
            <input type="hidden" name="form_build" id="definition" value="">
          </div>
          <div class="d-flex justify-content-end mt-10">
            <button type="button" id="reset" class="btn btn-light-primary me-3">Reset</button>
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
@section('style')
<style>
    .create-form .btn {
        display: inline-flex !important;   
        align-items: center !important;     
        justify-content: center !important;
        padding: 10px !important;
    }
</style>
@endsection



@section('script')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-render.min.js"></script>
<script>
  jQuery(function($) {
    var fbEditor = $(document.getElementById('fb-editor')).formBuilder({
      disableFields: [
        'autocomplete',
        'button',
        'file',
        'hidden',
        'starRating'
      ],
      showActionButtons: false 
    });

    $('#form').on('submit', function() {
      var formDefinition = fbEditor.actions.getData();
      $('#definition').val(JSON.stringify(formDefinition));
    });

    $('#reset').on('click', function() {
      fbEditor.actions.clearFields();
      $('#definition').val('');
    });
  });
</script>
@endsection
