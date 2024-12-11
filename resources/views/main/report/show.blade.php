@extends('layouts.main')
@section('content')
  <div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
      <div class="px-lg-20 mx-lg-20 mt-10 mb-20">
        <div class="row g-5 g-xl-10 justify-content-center">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="mb-8">
                  <a href="#" class="text-gray-900 text-hover-primary fs-2hx fw-bold">{{  $report->title }}</a>
                  <div class="d-flex align-items-center flex-wrap mt-6">
                    <div class="me-9 my-1 d-flex align-items-center">
                      <i class="ki-duotone ki-element-11 text-primary fs-2 me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                      </i>
                      <span class="fw-bold text-gray-500">{{ \Carbon\Carbon::parse($report->created_at)->format('M d, Y') }}</span>
                    </div>
                    <div class="me-9 my-1">
                      <div class="symbol symbol-30px symbol-circle">
                        <img src="{{  $report->user->photo_path ? Storage::url( $report->user->photo_path) : 'https://ui-avatars.com/api/?background=DFFFEA&color=04B440&bold=true&name='. $report->user->name }}" class="" alt="" />
                      </div>
                      <span class="fw-bold text-gray-500">{{  $report->user->name }}</span>
                    </div>
                  </div>
                </div>
                <a href="{{ Storage::url($report->file_path) }}" target="_blank">
                  <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 d-flex align-items-center ">
                    <i class="ki-duotone ki-file-down fs-2hx pe-5 text-primary">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    </i>
                    <span class="fs-6 fw-bold text-primary">Download File</span>
                  </div>
                </a>
                <div class="fs-5 fw-semibold text-gray-600 mt-5">
                  {!! $report->content !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-20">
          <div class="d-flex flex-stack mb-5">
            <h3 class="text-gray-900">Other Report</h3>
            <a href="{{ route('report') }}" class="fs-6 fw-semibold link-primary">See More</a>
          </div>
          <div class="separator separator-dashed mb-9"></div>
          <div class="row g-5 g-xl-10">
            <div class="col-lg-12">
              <div class="row">
                @foreach ($otherReport as $item)
                <div class="col-md-3 col-lg-3 pb-10 pb-lg-0">
                  <div class="card-xl-stretch me-md-6">
                    <div class="m-0">
                      <a href="{{ route('report.show', $item->slug) }}" class="fs-3 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">{{ $item->title }}</a>
                      <div class="fw-semibold fs-5 text-gray-600 text-gray-900 my-4">
                        {!! Str::limit(strip_tags($item->content), 100) !!}
                      </div>
                      <div class="fs-6 fw-bold">
                        <span class="text-gray-700 text-hover-primary">{{ $item->user->name }}</span>
                        <span class="text-muted">on {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</span>
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
  </div>
@endsection
