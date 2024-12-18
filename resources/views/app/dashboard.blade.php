@extends('layouts.app')

@section('content')
  <div class="row g-5 g-xl-10">
    <div class="col-xxl-12 mb-md-5 mb-xl-10">
      <div class="card bgi-no-repeat bgi-position-x-end bgi-size-cover"  style="background-size: auto 100%; background-image: url('https://preview.keenthemes.com/metronic8/demo4/assets/media/misc/taieri.svg')">
        <div class="card-body pt-9 pb-0">
          <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <div class="flex-grow-1">
              <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                <div class="d-flex flex-column">
                  <div class="d-flex align-items-center mb-2">
                    <a href="#" class="text-gray-900 text-hover-primary fs-1 fw-bolder me-1">Hi!, {{ Auth::user()->name}}
                    </a>
                  </div>
                  <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                    <span class="d-flex align-items-center text-gray-400 me-5 mb-2">
                      Have an a nice day
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-3 col-md-6 mt-5">
      <div class="card card-flush h-xl-100" style="background-color: #F1416C;background-image:url('{{ asset('app/media/svg/shapes/wave-bg-red.svg') }}')">
        <div class="card-body">
            <div class="fw-bold text-white text-end py-2">
                <span class="fs-3hx d-block">{{ $survey }}</span>
                <span>Survey Active</span>
            </div>          
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mt-5">
      <div class="card card-flush h-xl-100" style="background-color: #7239EA;background-image:url('{{ asset('app/media/svg/shapes/wave-bg-purple.svg') }}')">
        <div class="card-body">
            <div class="fw-bold text-white text-end py-2">
                <span class="fs-3hx d-block">{{ $news }}</span>
                <span>News</span>
            </div>          
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mt-5">
      <div class="card card-flush h-xl-100" style="background-color: #F6C000;background-image:url('{{ asset('app/media/svg/shapes/wave-bg-yellow.svg') }}')">
        <div class="card-body">
            <div class="fw-bold text-white text-end py-2">
                <span class="fs-3hx d-block">{{ $report }}</span>
                <span>Report</span>
            </div>          
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mt-5">
      <div class="card card-flush h-xl-100" style="background-color: #17C653;background-image:url('{{ asset('app/media/svg/shapes/wave-bg-green.svg') }}')">
        <div class="card-body">
            <div class="fw-bold text-white text-end py-2">
                <span class="fs-3hx d-block">{{ $message }}</span>
                <span>Message</span>
            </div>          
        </div>
      </div>
    </div>
  </div>
  @endsection