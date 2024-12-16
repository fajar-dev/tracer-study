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
      <div class="px-lg-20 mx-lg-20">
        <div class="row g-5 mb-20">
          <div class="col-xl-12">
            <div class="card bg-primary bg-opacity-15 h-md-100" dir="ltr">
              <div class="card-body d-flex justify-content-center">
                <div class="d-md-flex align-items-center pe-lg-5">
                  <div class="pe-lg-20">
                    <h1 class="fw-semibold text-gray-800 fs-lg-3hx fs-md-2hx">Selamat Datang <br> Di Website
                      <span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                          <span class="fw-bolder">Tracer Study</span>
                      </span>
                      <br />
                      <span class="fw-bolder">Universitas  Malikussaleh</span>
                    </h1>
                    <div class="mb-1 mt-5">
                      <a class="btn btn-lg btn-primary me-2" data-bs-target="#kt_modal_create_app" data-bs-toggle="modal">Isi Survey</a>
                    </div>
                  </div>
                  <div class="ps-lg-20">
                    <img src="{{ asset('app/media/svg/illustrations/easy/9.svg') }}" class="w-lg-400px w-md-300px" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-5 g-xl-10 my-10">
          <div class="col-xl-12">
            <div class="mb-17">
              <div class="d-flex flex-stack mb-5">
                <h1 class="text-gray-900 fs-2qx">Survey & Questionnaire</h1>
                <a href="{{ route('survey') }}" class="fs-6 fw-semibold link-primary">See More</a>
              </div>
              <div class="separator separator-dashed mb-9"></div>
              <div class="row">
                @foreach ($survey as $item)
                <div class="col-md-6 col-lg-3 pb-10 pb-lg-0">
                  <div class="card-xl-stretch me-md-6">
                    <div class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('{{ Storage::url($item->thumbnail_path) }}')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">
                    </div>
                    <div class="m-0">
                      <div class="fs-6 fw-bold">
                        <span class="text-gray-700">{{ $item->user->name }}</span>
                      </div>
                      <span class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">{{ $item->title }}</span>
                      <div class="mt-5">
                        <a href="{{ route('survey.show', $item->slug) }}" class="btn btn-primary">Isi Kuisioner</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="row g-5 g-xl-10 my-10">
          <div class="col-xl-12">
            <div class="mb-17">
              <div class="d-flex flex-stack mb-5">
                <h1 class="text-gray-900 fs-2qx">News & Article</h1>
                <a href="{{ route('news') }}" class="fs-6 fw-semibold link-primary">See More</a>
              </div>
              <div class="separator separator-dashed mb-9"></div>
              <div class="row">
                @foreach ($news as $index => $item)
                    @if ($index == 0)
                        <div class="col-md-6">
                            <div class="card-xl-stretch me-md-6">
                              <div class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-350px mb-5" style="background-image:url('{{ Storage::url($item->thumbnail_path) }}')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">
                              </div>
                                <div class="m-0">
                                  <a href="{{ route('news.show', $item->slug) }}" class="fs-1 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">{{ $item->title }}</a>
                                  <div class="fw-semibold fs-5 text-gray-600 text-gray-900 my-4">
                                    {!! Str::limit(strip_tags($item->content), 300) !!}
                                  </div>
                                    <div class="d-flex flex-stack flex-wrap">    
                                      <div class="d-flex align-items-center pe-2">
                                          <div class="symbol symbol-35px symbol-circle me-3">
                                              <img alt="" src="{{  $item->user->photo_path ? Storage::url( $item->user->photo_path) : 'https://ui-avatars.com/api/?background=DFFFEA&color=04B440&bold=true&name='. $item->user->name }}">                                          
                                          </div>           
                                          <div class="fs-5 fw-bold">
                                              <span class="text-gray-700">{{ $item->user->name }}</span>
                                              <span class="text-muted">on {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</span>                   
                                          </div>
                                      </div>
                                      <span class="badge badge-light-primary fw-bold my-2">{{ $item->newsCategory->name }}</span>
                                  </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="col-md-6">
                  <div class="row">
                    @foreach ($news as $index => $item)
                        @if ($index >= 1)
                            <div class="col-md-6 pb-10">
                                <div class="card-xl-stretch me-md-6">
                                    <div class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('{{ Storage::url($item->thumbnail_path) }}')" data-fslightbox="lightbox-video-tutorials" href="https://www.youtube.com/embed/btornGtLwIo">
                                    </div>
                                    <div class="m-0">
                                        <a href="{{ route('news.show', $item->slug) }}" class="fs-4 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">{{ $item->title }}</a>
                                        <div class="d-flex flex-stack flex-wrap">    
                                            <div class="d-flex align-items-center pe-2">
                                                <div class="symbol symbol-35px symbol-circle me-3">
                                                    <img alt="" src="{{  $item->user->photo_path ? Storage::url( $item->user->photo_path) : 'https://ui-avatars.com/api/?background=DFFFEA&color=04B440&bold=true&name='. $item->user->name }}">                                          
                                                </div>           
                                                <div class="fs-5 fw-bold">
                                                    <span class="text-gray-700">{{ $item->user->name }}</span>
                                                    <span class="text-muted">on {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</span>                   
                                                </div>
                                            </div>
                                            <span class="badge badge-light-primary fw-bold my-2">{{ $item->newsCategory->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-10">
          <div class="col-xl-12">
            <div class="mb-17">
              <div class="d-flex flex-stack mb-5">
                <h1 class="text-gray-900 fs-2qx">Report</h1>
                <a href="{{ route('report') }}" class="fs-6 fw-semibold link-primary">See More</a>
              </div>
              <div class="separator separator-dashed mb-9"></div>
              <div class="row">
                @foreach ($report as $item)
                <div class="col-md-6 col-lg-3 pb-10 pb-lg-0">
                  <div class="card-xl-stretch me-md-6">
                    <div class="m-0">
                      <a href="{{ route('report.show', $item->slug) }}" class="fs-3 text-gray-900 fw-bold text-hover-primary text-gray-900 lh-base">{{ $item->title }}</a>
                      <div class="fw-semibold fs-5 text-gray-600 text-gray-900 my-4">
                        {!! Str::limit(strip_tags($item->content), 100) !!}
                      </div>
                      <div class="fs-6 fw-bold">
                        <span class="text-gray-700">{{ $item->user->name }}</span>
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
        <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-10" style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">
          <div class="my-2 me-5">
            <div class="fs-1 fs-lg-2qx fw-bold text-white mb-2">Mari sukseskan pelaksanaan Tracer Study <br> Universitas Malikussaleh</div>
          </div>
          <a href="https://1.envato.market/EA4JP" class="btn btn-lg btn-outline border-2 btn-outline-white text-white flex-shrink-0 my-2">Isi Survey</a>
        </div>
        <div class="row mb-10">
          <div class="col-xl-12">
            <div class="mb-17">
              <div class="card">
                <div class="card-body p-lg-17">
                  <div class="row">
                    <div class="col-md-6 pe-lg-10">
                      <form action="{{ route('message.store') }}" class="form mb-15" method="post" id="kt_contact_form">
                        @csrf
                        <h1 class="fw-bold text-gray-900 mb-9">Send Us Email</h1>
                        <div class="d-flex flex-column mb-5 fv-row">
                          <label class="fs-5 fw-semibold mb-2">Name</label>
                          <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{ old('name') }}" />
                          @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="d-flex flex-column mb-5 fv-row">
                          <label class="fs-5 fw-semibold mb-2">Email</label>
                          <input class="form-control form-control-solid" placeholder="" type="email" name="email" value="{{ old('email') }}" />
                          @error('email')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="d-flex flex-column mb-10 fv-row">
                          <label class="fs-6 fw-semibold mb-2">Message</label>
                          <textarea class="form-control form-control-solid" rows="6" name="message" placeholder="">{{ old('message') }}</textarea>
                          @error('message')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                          <span class="indicator-label">Send Feedback</span>
                          <span class="indicator-progress">Please wait... 
                          <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                      </form>
                    </div>
                    <div class="col-md-6 ps-lg-10">
                      <div id="kt_contact_map" class="w-100 rounded mb-2 mb-lg-0 mt-2" style="height: 486px">
                        <iframe class="rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d993.3418825549724!2d97.06313349999999!3d5.2047969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30477796fd166881%3A0x3417d1e1525cbe2c!2sKesekretariatan%20UKM%20KSR%20PMI%20Unit%2004%20Universitas%20Malikussaleh!5e0!3m2!1sen!2sid!4v1631072963464!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                      </div>
                    </div>
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
