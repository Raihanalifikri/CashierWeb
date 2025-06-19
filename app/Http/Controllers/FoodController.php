<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index(Request $request){
      $foods = Food::with('category')
        ->when(request('name'), function ($query, $name) {
            $query->where('name', 'like', '%' . $name . '%');
        })
         ->orderBy('id', 'desc')
        ->paginate(5);

        $category = Category::all();
        return view('pages.food.index', compact('foods', 'category'));
    }


    public function show($id){
        $food = Food::findOrFail($id);
        return view('pages.food.show', compact('food'));
    }

    public function create(){
        $category = Category::all();
        return view('pages.food.create', compact('category'));
    }

    public function store(Request $request){
        $request->validate([
           'category_id' => 'required',
           'name' => 'required',
           'price' => 'required',
           'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $food = new Food;
        $food->category_id = $request->category_id;
        $food->user_id = auth()->id();
        $food->name = $request->name;
        $food->price = $request->price;
       

        // Upload photo
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
        $food->photo = $photoPath;
    }

     $food->save();


        return redirect()->route('food.index')->with('success', 'Food created successfully');
    }

    public function edit($id){
        $food = Food::findOrFail($id);
        $category = Category::all();
        return view('pages.food.edit', compact('food', 'category'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $food = Food::findOrFail($id);
        $food->category_id = $request->category_id;
        $food->user_id = auth()->id();
        $food->name = $request->name;
        $food->price = $request->price;

         // Cek jika ada file foto baru
    if ($request->hasFile('photo')) {
        // Hapus foto lama dari storage jika ada
        if ($food->photo && Storage::disk('public')->exists($food->photo)) {
            Storage::disk('public')->delete($food->photo);
        }

        // Simpan foto baru
        $photoPath = $request->file('photo')->store('photos', 'public');
        $food->photo = $photoPath;
    }
        $food->save();


        return redirect()->route('food.index')->with('success', 'Food updated successfully');


    }

    public function destroy($id){
        $food = Food::findOrFail($id);
        $food->delete();

        return redirect()->route('food.index')->with('success', 'Food created successfully');
    }
}
