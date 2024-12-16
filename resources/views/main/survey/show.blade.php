@extends('layouts.main')
@section('seo')
  <meta
  name="keywords"
  content="tracer, study, university, malikussaleh, unimal, universitas, bkk, upt, alumni, mahasiswa, dosen, survey, kuisioner"
  />
  <meta name="author" content="{{ $survey->user->name }}" />
  <meta name="description" content="{!! Str::limit(strip_tags($survey->content), 100) !!}" />

  <!-- Open Graph Meta Tags -->
  <meta property="og:url" content="{{ route('survey.show', $survey->slug) }}" />
  <meta property="og:title" content="Tracer Study | {{ $title }} @if($subTitle) - {{ $subTitle }} @endif" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="{{ Storage::url($survey->thumbnail_path) }}" />
  <meta
    property="og:description"
    content="{!! Str::limit(strip_tags($survey->content), 100) !!}"
  />
  <meta property="og:locale" content="id_ID" />

  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Tracer Study | {{ $title }} @if($subTitle) - {{ $subTitle }} @endif" />
  <meta
    name="twitter:description"
    content="{!! Str::limit(strip_tags($survey->content), 100) !!}"
  />
  <meta name="twitter:image" content="{{ Storage::url($survey->thumbnail_path) }}" />

  <!-- Additional SEO Meta Tags -->
  <meta name="distribution" content="global" />
  <meta name="revisit-after" content="7 days" />
  <meta name="rating" content="general" />
  <meta name="language" content="Indonesian" />
  <meta name="geo.region" content="ID" />
  <meta name="geo.placename" content="Lhokseumawe" />

  <!-- Canonical Tag -->
  <link rel="canonical" href="{{ route('survey.show', $survey->slug) }}" />
@endsection
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-fluid">
    <div class="px-lg-20 mx-lg-20 mt-10 mb-20">
      <div class="row g-5 g-xl-10 justify-content-center">
        <div class="col-lg-9">
          <div class="card">
            <div class="card-body">
              <div class="position-relative mb-17">
                <div class="overlay overlay-show">
                  <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-250px" style="background-image:url('{{ Storage::url($survey->thumbnail_path) }}')"></div>
                  <div class="overlay-layer rounded bg-black" style="opacity: 0.4"></div>
                </div>
                <div class="position-absolute text-white mb-8 ms-10 bottom-0">
                  <h3 class="text-white fs-2qx fw-bold mb-3 m">{{ $survey->title }}</h3>
                  <div class="fs-5 fw-semibold">{!! $survey->description !!}</div>
                </div>
              </div>
              <div class="text-gray-700 mt-5">
                @if (session()->has('success'))
                <div class="alert alert-primary d-flex align-items-center p-5">
                  <i class="ki-duotone ki-shield-tick fs-2hx text-primary me-4"><span class="path1"></span><span class="path2"></span></i>
                  <div class="d-flex flex-column">
                      <h4 class="mb-1 text-dark">Thank You !!</h4>
                      <span>Your response has been record successfuly</span>
                  </div>
              </div>
                @else
                <form class="form-submit" action="{{ route('survey.submit', $survey->id) }}" method="POST">
                  @csrf
                  <div id="rendered-form" ></div>
                  <div class="d-flex justify-content-end mt-10">
                    <button type="button" id="reset" class="btn btn-light-primary me-3">Reset</button>
                    <button type="submit" id="submit" class="btn btn-primary">
                      <span class="indicator-label">Submit</span>
                      <span class="indicator-progress" style="display: none;">Loading...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                  </div>
                </form>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  document.querySelector('#reset').addEventListener('click', function () {
    document.getElementById('rendered-form').reset();
  });

  document.querySelectorAll('.form-submit').forEach(function (form) {
    form.addEventListener('submit', function (event) {
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
  $(document).ready(function () {
    const formData = @json($questions);

    $('#rendered-form').formRender({
      formData: formData
    });
  });
</script>
@endsection
