@extends('layouts.main')
@section('seo')
  <meta
  name="keywords"
  content="tracer, study, university, malikussaleh, unimal, universitas, bkk, upt, alumni, mahasiswa, dosen, survey, kuisioner"
  />
  <meta name="author" content="Universitas Malikussaleh" />
  <meta name="description" content="Selamat Datang Di Website Tracer Study Universitas Malikussaleh" />

  <!-- Open Graph Meta Tags -->
  <meta property="og:url" content="{{ route('home') }}" />
  <meta property="og:title" content="Tracer Study | {{ $title }} @if($subTitle) - {{ $subTitle }} @endif" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="{{ asset('icon/selamat-datang.png') }}" />
  <meta
    property="og:description"
    content="Selamat Datang Di Website Tracer Study Universitas Malikussaleh"
  />
  <meta property="og:locale" content="id_ID" />

  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Tracer Study | {{ $title }} @if($subTitle) - {{ $subTitle }} @endif" />
  <meta
    name="twitter:description"
    content="Selamat Datang Di Website Tracer Study Universitas Malikussaleh"
  />
  <meta name="twitter:image" content="{{ asset('icon/selamat-datang.png') }}" />

  <!-- Additional SEO Meta Tags -->
  <meta name="distribution" content="global" />
  <meta name="revisit-after" content="7 days" />
  <meta name="rating" content="general" />
  <meta name="language" content="Indonesian" />
  <meta name="geo.region" content="ID" />
  <meta name="geo.placename" content="Lhokseumawe" />

  <!-- Canonical Tag -->
  <link rel="canonical" href="{{ route('home') }}" />
@endsection
@section('content')
  <div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
      <div class="px-lg-20 mx-lg-20 mt-10 mb-20">
        <div class="d-md-flex flex-stack mb-5">
          <div>
            <h1 class="text-gray-900 fw-bolder fs-2hx">Survey & Questionnaire
            </h1>
              <h3 class="text-gray-600">
                @if (request('q'))
                  Search: "{{request('q')}}"
                @endif
              </h3>
          </div>
          <form method="GET" class="d-flex justify-content-between">
            <div class="position-relative">
              <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"><span class="path1"></span><span class="path2"></span></i>
              <input type="text" class="form-control form-control-solid ps-10" name="q" value="{{ request('q') }}"  placeholder="Search">
            </div>
            <button class="btn btn-primary btn-icon ms-3" type="submit" id="button-addon2">
              <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
              </span>
            </button>
          </form>
        </div>
        <div class="separator separator-dashed mb-12"></div>
        <div class="row g-5 g-xl-10">
          <div class="col-lg-12">
            <div class="row">
              @if ($survey->total() == 0)
                  <div class="mb-10 text-center">
                    <span class="text-center">
                      No data available
                    </span>
                  </div>
              @else
                @foreach ($survey as $item)
                  <div class="col-md-6 col-lg-3 pb-10">
                    <div class="card-xl-stretch me-md-6">
                      <div class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('{{ Storage::url($item->thumbnail_path) }}')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">
                      </div>
                      <div class="m-0">
                        <div class="fs-6 fw-bold">
                          <span class="text-gray-700 text-hover-primary">{{ $item->user->name }}</span>
                        </div>
                        <a href="{{ route('survey.show', $item->slug) }}" class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">{{ $item->title }}</a>
                        <div class="mt-5">
                          <a href="{{ route('survey.show', $item->slug) }}" class="btn btn-primary">Isi Kuisioner</a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach 
              @endif
            </div>
            <div class="row">
              <div class="d-flex flex-stack flex-wrap my-3">
                <div class="fs-6 fw-semibold text-gray-700">
                    Showing {{ $survey->firstItem() }} to {{ $survey->lastItem() }} of {{ $survey->total() }}  records
                </div>
                <ul class="pagination">
                    @if ($survey->onFirstPage())
                        <li class="page-item previous">
                            <a href="#" class="page-link"><i class="previous"></i></a>
                        </li>
                    @else
                        <li class="page-item previous">
                            <a href="{{ $survey->previousPageUrl() }}" class="page-link bg-light"><i class="previous"></i></a>
                        </li>
                    @endif
            
                    @php
                        $start = max($survey->currentPage() - 2, 1);
                        $end = min($start + 4, $survey->lastPage());
                    @endphp
            
                    @if ($start > 1)
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
            
                    @foreach ($survey->getUrlRange($start, $end) as $page => $url)
                        <li class="page-item{{ ($page == $survey->currentPage()) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
            
                    @if ($end < $survey->lastPage())
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
            
                    @if ($survey->hasMorePages())
                        <li class="page-item next">
                            <a href="{{ $survey->nextPageUrl() }}" class="page-link bg-light"><i class="next"></i></a>
                        </li>
                    @else
                        <li class="page-item next">
                            <a href="#" class="page-link"><i class="next"></i></a>
                        </li>
                    @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
