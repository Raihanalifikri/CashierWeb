<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalCategory = Category::count();
        $totalFood = Food::count();
        return view('pages.dashboard', compact('totalCategory', 'totalFood'));
    }
}
