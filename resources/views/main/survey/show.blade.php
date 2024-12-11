@extends('layouts.main')
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
                <div class="fs-5 fw-semibold text-gray-600 mt-5">
                  {{-- {!! $report->content !!} --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
