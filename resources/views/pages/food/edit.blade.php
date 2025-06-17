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
                <h1>Create News</h1>
                <div class="section-header-button">
                    <a href="{{ route('food.index') }}" class="btn btn-danger"><i class=""></i>
                        < Back</a>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Food</h4>
                    </div>
                    <form action="{{ route('food.update', $food->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label class="col-form-label  col-12 col-lg-3">Name Food</label>
                                <div class="col-sm-12 ">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $food->name) }}">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-form-label  col-12 col-lg-3">Category</label>
                                <div class="col-sm-12 ">
                                    <select name="category_id" class="form-control selectric">
                                        <option selected>==== Choose Category ====</option>
                                        @foreach ($category as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           <div class="form-group mb-4">
                                <label class="col-form-label  col-12 col-lg-3">Price</label>
                                <div class="col-sm-12 ">
                                    <input type="text" class="form-control" name="price" value="{{ old('price', $food->price) }}">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-form-label  col-12 col-lg-3">Photo</label>
                                <div class="col-sm-12 ">
                                    <input name="photo" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="section-button col-12 col-lg-3">
                                <button type="submit" class="btn btn-primary">Publish <i class="fa-solid fa-upload"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
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
