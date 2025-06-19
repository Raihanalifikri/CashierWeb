<aside class="w-full md:w-1/4 bg-white border-l p-4">
    <h2 class="text-xl font-semibold mb-4">Keranjang</h2>
    @php
        $cart = session('cart', []);
        $total = 0;
    @endphp
    <ul class="space-y-3 text-sm">
        @forelse ($cart as $id => $item)
            <li class="flex justify-between items-center">
                <div>
                    <span>{{ $item['name'] }} x{{ $item['qty'] }}</span>
                    <div class="flex gap-1 mt-1">
                        <form action="{{ route('cart.decrease', $id) }}" method="POST">@csrf<button class="px-2">-</button></form>
                        <form action="{{ route('cart.increase', $id) }}" method="POST">@csrf<button class="px-2">+</button></form>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">@csrf<button class="text-red-500 px-2">🗑</button></form>
                    </div>
                </div>
                <span>Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
            </li>
            @php $total += $item['price'] * $item['qty']; @endphp
        @empty
            <li class="text-gray-400">Belum ada pesanan</li>
        @endforelse
    </ul>
    <div class="mt-4 pt-4 border-t font-semibold flex justify-between">
        <span>Total</span>
       <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
    </div>
</aside>
