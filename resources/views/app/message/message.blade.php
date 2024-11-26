@extends('layouts.app')

@section('content')
  <div class="row g-5 g-xl-10">
    <div class="col-xl-12 mb-8">
      <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
          <div class="card-title">
            <h3 class="card-title align-items-start flex-column">
              <span class="card-label fw-bold fs-3 mb-1">Message</span>
              <span class="text-muted fw-semibold fs-7">Message List</span>
            </h3>
          </div>
          <div class="card-toolbar">
            <form method="GET" class="card-title">
              <input type="hidden" name="page" value="{{ request('page', 1) }}">
              <div class="input-group d-flex align-items-center position-relative my-1">
                <input type="text"  class="form-control form-control-solid  ps-5 rounded-0" name="q" value="{{ request('q') }}" placeholder="Search" />
                <button class="btn btn-primary btn-icon" type="submit" id="button-addon2">
                  <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                  </span>
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="table-responsive">
            <table class="table table-row-dashed fs-6 gy-5">
              <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                  <th class="min-w-100px">Name</th>
                  <th class="min-w-100px">Email</th>
                  <th class="min-w-200px">Content</th>
                  <th class="min-w-100px">Submit Date</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @if ($message->total() == 0)
                  <tr class="max-w-10px">
                    <td colspan="6" class="text-center">
                      No data available in table
                    </td>
                  </tr>
                @else
                  @foreach ($message as $item)     
                    <tr>
                      <td>
                        <div class="text-start">
                          <div class="fs-6 fw-bold">
                            <div class="fs-6 fw-bold">{{ $item->name }}</div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="text-start">
                          <div class="fs-6 fw-bold">{{ $item->email }}</div>
                        </div>
                      </td>
                      <td>
                        <div class="text-start">
                          <div class="fs-6 fw-bold">{{ $item->content }}</div>
                        </div>
                      </td>
                      <td>
                        <div class="text-start">
                          <div class="fs-6 fw-bold">{{ $item->created_at }}</div>
                        </div>
                      </td>
                      <td class="text-end">
                        <button class="btn btn-danger btn-icon btn-sm btn-del" id="{{ route('admin.message.destroy', $item->id) }}">
                          <i class="ki-outline ki-trash btn-del" id="{{ route('admin.message.destroy', $item->id) }}">
                          </i>
                        </button>
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
          <div class="d-flex flex-stack flex-wrap my-3">
            <div class="fs-6 fw-semibold text-gray-700">
                Showing {{ $message->firstItem() }} to {{ $message->lastItem() }} of {{ $message->total() }}  records
            </div>
            <ul class="pagination">
                @if ($message->onFirstPage())
                    <li class="page-item previous">
                        <a href="#" class="page-link"><i class="previous"></i></a>
                    </li>
                @else
                    <li class="page-item previous">
                        <a href="{{ $message->previousPageUrl() }}" class="page-link bg-light"><i class="previous"></i></a>
                    </li>
                @endif
        
                @php
                    // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                    $start = max($message->currentPage() - 2, 1);
                    $end = min($start + 4, $message->lastPage());
                @endphp
        
                @if ($start > 1)
                    <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                @endif
        
                @foreach ($message->getUrlRange($start, $end) as $page => $url)
                    <li class="page-item{{ ($page == $message->currentPage()) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
        
                @if ($end < $message->lastPage())
                    <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                @endif
        
                @if ($message->hasMorePages())
                    <li class="page-item next">
                        <a href="{{ $message->nextPageUrl() }}" class="page-link bg-light"><i class="next"></i></a>
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
@endsection
