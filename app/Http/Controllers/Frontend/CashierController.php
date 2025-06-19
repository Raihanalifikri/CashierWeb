<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class CashierController extends Controller
{
   public function index(Request $request)
{
    $categories = Category::all();

    // Cek apakah ada filter kategori
    $categoryId = $request->category;

    if ($categoryId) {
        $foods = Food::where('category_id', $categoryId)->get();
    } else {
        $foods = Food::all();
    }

    return view('pages.frontend.dashboard', compact('categories', 'foods'));
}


public function addToCart(Request $request)
{
    // Validasi data request
    $request->validate([
        'food_id' => 'required|integer',
        'food_name' => 'required|string',
        'food_price' => 'required|numeric',
    ]);

    // Ambil cart dari session, atau buat array baru kalau belum ada
    $cart = session()->get('cart', []);

    $foodId = $request->food_id;
    $foodName = $request->food_name;
    $foodPrice = (int) $request->food_price;

    // Jika item sudah ada di cart, tambahkan qty
    if (isset($cart[$foodId]) && isset($cart[$foodId]['qty'])) {
        $cart[$foodId]['qty'] += 1;
    } else {
        // Jika belum ada, tambahkan item baru
        $cart[$foodId] = [
            'name' => $foodName,
            'price' => $foodPrice,
            'qty' => 1,
        ];
    }

    // Simpan kembali ke session
    session()->put('cart', $cart);

    return redirect()->route('cashier')->with('success', 'Item berhasil ditambahkan ke cart!');
}

public function increaseQty($id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        $cart[$id]['qty'] += 1;
        session()->put('cart', $cart);
    }
    return redirect()->back();
}

public function decreaseQty($id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        $cart[$id]['qty'] -= 1;
        if ($cart[$id]['qty'] <= 0) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
    }
    return redirect()->back();
}

public function removeItem($id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }
    return redirect()->back();
}


}
