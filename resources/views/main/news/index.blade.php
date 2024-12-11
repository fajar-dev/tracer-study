@extends('layouts.main')
@section('content')
  <div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
      <div class="px-lg-20 mx-lg-20 mt-10 mb-20">
        <div class="d-flex flex-stack mb-5">
          <h1 class="text-gray-900 fw-bolder fs-2hx">News & Article</h1>
        </div>
        <div class="separator separator-dashed mb-9"></div>
        <div class="row g-5 g-xl-10">
          <div class="col-lg-9">
            <div class="row">
              @foreach ($news as $index => $item)
              <div class="col-md-4 mb-10">
                  <div class="card-xl-stretch me-md-6">
                    <div class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('{{ Storage::url($item->thumbnail_path) }}')">
                    </div>
                      <div class="m-0">
                        <a href="{{ route('news.show', $item->slug) }}" class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">{{ $item->title }}</a>
                        <div class="fw-semibold fs-5 text-gray-600 text-gray-900 my-4">
                          {!! Str::limit(strip_tags($item->content), 100) !!}
                        </div>
                          <div class="d-flex flex-stack flex-wrap">    
                            <div class="d-flex align-items-center pe-2">
                                <div class="symbol symbol-35px symbol-circle me-3">
                                    <img alt="" src="{{  $item->user->photo_path ? Storage::url( $item->user->photo_path) : 'https://ui-avatars.com/api/?background=DFFFEA&color=04B440&bold=true&name='. $item->user->name }}">                                          
                                </div>           
                                <div class="fs-5 fw-bold">
                                    <a href="/metronic8/demo47/pages/user-profile/overview.html" class="text-gray-700 text-hover-primary">{{ $item->user->name }}</a>
                                    <span class="text-muted">on {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</span>                   
                                </div>
                            </div>
                            <span class="badge badge-light-primary fw-bold my-2">{{ $item->newsCategory->name }}</span>
                        </div>
                      </div>
                  </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                  <div class="mb-16">
                      <h4 class="text-gray-900 mb-7">Search News</h4>
                      <div class="position-relative">
                          <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"><span class="path1"></span><span class="path2"></span></i>
                          <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search" fdprocessedid="1w95zi">
                      </div>
                  </div>
                  <div class="mb-0">
                      <h4 class="text-gray-900 mb-7">Categories</h4>
                      @foreach ($category as $item)
                        <div class="d-flex flex-stack fw-semibold fs-5 text-muted mb-4">
                            <a href="#" class="text-muted text-hover-primary pe-2">
                                {{$item->name }}        
                            </a>
                        </div>
                      @endforeach
                  </div>          
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
