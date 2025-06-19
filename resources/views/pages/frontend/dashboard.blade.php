@extends('pages.frontend.layout.app')

@section('title', 'Dashboard')

@section('main')
    <!-- Top Filter -->
    <div class="mb-6 space-y-4">
        <h1 class="text-2xl font-bold">Order Menu</h1>
        <div class="flex gap-2 overflow-x-auto whitespace-nowrap">
            <a href="{{ route('cashier') }}">
                <button
                    class="px-4 py-1 rounded border 
      {{ request('category') == null ? 'bg-yellow-400 text-white' : 'bg-white' }}">
                    All
                </button>
            </a>


            @foreach ($categories as $category)
                <a href="{{ route('cashier', ['category' => $category->id]) }}">
                    <button
                        class="px-4 py-1 rounded border 
        {{ request('category') == $category->id ? 'bg-yellow-400 text-white' : 'bg-white' }}">
                        {{ $category->name }}
                    </button>
                </a>
            @endforeach


        </div>
    </div>


    <!-- Menu Items -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($foods as $food)
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="food_id" value="{{ $food->id }}">
                <input type="hidden" name="food_name" value="{{ $food->name }}">
                <input type="hidden" name="food_price" value="{{ $food->price }}">

                <button type="submit" class="block w-full bg-white hover:bg-gray-100 p-4 rounded-lg shadow text-center">
                    <img src="{{ asset('storage/' . $food->photo) }}" class="mx-auto mb-2 w-20 h-20 object-cover" />
                    <h3 class="font-semibold">{{ $food->name }}</h3>
                    <p class="text-gray-500 text-sm">Rp {{ number_format($food->price, 0, ',', '.') }}</p>
                </button>
            </form>
            
        @endforeach
    </div>


@endsection
