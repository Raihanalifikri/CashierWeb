@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $category->name }}</h1>
                <div class="section-header-button">
                    <a href="{{ route('category.index') }}" class="btn btn-danger"><i class="fa-solid fa-backward"></i>
                        Back</a>
                </div>
            </div>
            <div class="row">
                @foreach ($foods as $food)
                    <div class="card-body col-6">
                        <div class="card ">
                            <div class="card-header">
                                <h4>{{ $row->name }}</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary">View All</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text-muted mb-2">{{  \Illuminate\Support\Str::words(strip_tags($row->content), 5, '...') }}</div>
                                <div class="chocolat-parent">
                                    <a href="" class="chocolat-image"
                                        title="Just an example">
                                        <div data-crop-image="285">
                                            <img alt="image" src="{{ asset('storage/' . $row->photo) }}"
                                                class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer text-right">
                
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
