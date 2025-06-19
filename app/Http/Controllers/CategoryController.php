<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::query()
        ->when($request->input('name'), function ($query, $name) {
            $query->where('name', 'like', '%' . $name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.category.index', compact('categories'));
    }

    public function show(Request $request,$id){
        $category = Category::findOrFail($id);
        $foods = Food::where('category_id', $id)
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('pages.category.show', compact('category', 'foods'));
    }

    public function create(){
        return view('pages.category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

     public function edit($id) {
        $category = Category::findOrFail($id);
        $user = Auth::user();

        return view('pages.category.edit', compact('category', 'user'));
    }

    public function update(Request $request, $id) {

        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required'
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
