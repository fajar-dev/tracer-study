@extends('layouts.main')
@section('content')
  <div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
      <div class="px-lg-20 mx-lg-20 mt-10 mb-20">
        <div class="row g-5 g-xl-10">
          <div class="col-lg-9">
            <div class="">
              <div class="mb-8">
                <a href="#" class="text-gray-900 text-hover-primary fs-2hx fw-bold">{{  $news->title }}</a>
                <div class="d-flex align-items-center flex-wrap mt-6">
                  <div class="me-9 my-1 d-flex align-items-center">
                    <i class="ki-duotone ki-element-11 text-primary fs-2 me-1">
                      <span class="path1"></span>
                      <span class="path2"></span>
                      <span class="path3"></span>
                      <span class="path4"></span>
                    </i>
                    <span class="fw-bold text-gray-500">{{ \Carbon\Carbon::parse($news->created_at)->format('M d, Y') }}</span>
                  </div>
                  <div class="me-9 my-1 d-flex align-items-center">
                    <i class="ki-duotone ki-briefcase text-primary fs-2 me-1">
                      <span class="path1"></span>
                      <span class="path2"></span>
                    </i>
                    <span class="fw-bold text-gray-500">{{  $news->newsCategory->name }}</span>
                  </div>
                  <div class="me-9 my-1">
                    <div class="symbol symbol-30px symbol-circle">
                      <img src="{{  $news->user->photo_path ? Storage::url( $news->user->photo_path) : 'https://ui-avatars.com/api/?background=DFFFEA&color=04B440&bold=true&name='. $news->user->name }}" class="" alt="" />
                    </div>
                    <span class="fw-bold text-gray-500">{{  $news->user->name }}</span>
                  </div>
                </div>
                <div class="overlay mt-8">
                  <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-450px" style="background-image:url('{{ Storage::url($news->thumbnail_path) }}')"></div>
                  
                </div>
              </div>
              <div class="fs-5 fw-semibold text-gray-600">
                {!! $news->content !!}
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                  <div class="mb-16">
                      <h4 class="text-gray-900 mb-7">Search Blog</h4>
                      <div class="position-relative">
                          <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"><span class="path1"></span><span class="path2"></span></i>
                          <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search" fdprocessedid="1w95zi">
                      </div>
                  </div>
                  <div class="mb-16">
                      <h4 class="text-gray-900 mb-7">Categories</h4>
                      @foreach ($category as $item)
                        <div class="d-flex flex-stack fw-semibold fs-5 text-muted mb-4">
                            <a href="#" class="text-muted text-hover-primary pe-2">
                                {{$item->name }}        
                            </a>
                        </div>
                      @endforeach
                  </div> 
                  <div class="m-0">
                    <h4 class="text-gray-900 mb-7">Recent Posts</h4>
                    @foreach ($recentPost as $item)
                    <div class="d-flex flex-stack mb-7">
                      <div class="symbol symbol-60px symbol-2by3 me-4">
                        <div class="symbol-label" style="background-image: url('{{ Storage::url($item->thumbnail_path) }}')"></div>
                      </div>
                      <div class="m-0">
                        <a href="{{ route('news.show', $item->slug) }}" class="text-gray-900 fw-bold text-hover-primary fs-6">{{ $item->title }}</a>
                        <span class="text-gray-600 fw-semibold d-block pt-1 fs-7">{!! Str::limit(strip_tags($item->content), 50) !!}</span>
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
    </div>
  </div>
@endsection
