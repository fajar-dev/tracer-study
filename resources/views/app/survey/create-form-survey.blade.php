@extends('layouts.app')

@section('content')
<form action="{{ route('admin.survey.create-form.submit', $survey->id) }}" enctype="multipart/form-data" method="post" id="form" class="row g-5 g-xl-8 justify-content-center">
  @csrf
  <div class="col-xl-12 mb-8">
    <div class="row">
      <div class="card card-flush">
        <div class="card-body pt-0">
          <div class="mb-3 mt-9">
            <div id="fb-editor"></div>
            <input type="hidden" name="form_build" id="definition" value="">
          </div>
          <div class="d-flex justify-content-end">
            <a href="{{ route('admin.survey') }}" class="btn btn-light-primary me-3">Cancel</a>
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
    var fbEditor = $(document.getElementById('fb-editor')).formBuilder();
    $('#form').on('submit', function() {
      var formDefinition = fbEditor.actions.getData();
      $('#definition').val(JSON.stringify(formDefinition));
    });
  });
</script>
@endsection