@extends('layouts.main')
@section('content')
  <div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
      <div class="px-lg-20 mx-lg-20 mt-10 mb-20">
        <div class="d-md-flex flex-stack mb-5">
          <h1 class="text-gray-900 fw-bolder fs-2hx">Survey & Questionnaire</h1>
          <div class="position-relative">
            <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"><span class="path1"></span><span class="path2"></span></i>
              <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search" fdprocessedid="1w95zi">
          </div>
        </div>
        <div class="separator separator-dashed mb-12"></div>
        <div class="row g-5 g-xl-10">
          <div class="col-lg-12">
            <div class="row">
              @foreach ($survey as $item)
                <div class="col-md-6 col-lg-3 pb-10 pb-lg-0">
                  <div class="card-xl-stretch me-md-6">
                    <div class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('{{ Storage::url($item->thumbnail_path) }}')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">
                    </div>
                    <div class="m-0">
                      <div class="fs-6 fw-bold">
                        <a href="pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">{{ $item->user->name }}</a>
                      </div>
                      <a href="pages/user-profile/overview.html" class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">{{ $item->title }}</a>
                      <div class="mt-5">
                        <a href="" class="btn btn-primary">Isi Kuisioner</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
