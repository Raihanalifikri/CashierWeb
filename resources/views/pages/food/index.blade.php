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
                <h1>Food</h1>
                <div class="section-header-button">
                    <a href="{{ route('food.create') }}" class="btn btn-primary"><i class="far fa-edit"></i> Create</a>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Food Table Data</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table-striped table-md table">
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($foods as $food)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                    <td>{{ $food->name }}</td>
                                    <td>{{ $food->price }}</td>
                                    <td>{{ $food->category->name }}</td>
                                    <td>
                                            <a href="{{ route('food.edit', $food->id) }}" class="btn btn-icon btn-success"><i
                                                    class="far fa-edit"></i></a>
                                             <a href="#"
                                                onclick="event.preventDefault();
                                                        document.getElementById('delete-form-{{ $food->id }}').submit();"
                                                class="btn btn-icon btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            <form action="{{ route('food.destroy', $food->id) }}" method="POST"
                                                id="delete-form-{{ $food->id }}" style="display:none;">
                                                @csrf @method('DELETE')
                                            </form>
                                            <a href="#" class="btn btn-icon btn-info"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        
                    </div>
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
