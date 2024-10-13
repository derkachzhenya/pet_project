<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Categorylocal;

class HomeController extends Controller
{
    public function index()
    {
        $catsCount = Pet::where('category_id', 2)->count();
        $dogsCount = Pet::where('category_id', 1)->count();
        $birdsCount = Pet::where('category_id', 1)->count();
        $rodentsCount = Pet::where('category_id', 1)->count();
        $reptilesCount = Pet::where('category_id', 1)->count();

        $categories = Category::all();
        $categorylocals = Categorylocal::all();
        $pets = Pet::with('user')->latest()->get();
        return view('welcome', compact('categorylocals', 'categories', 'catsCount', 'dogsCount', 
        'birdsCount', 'rodentsCount', 'reptilesCount'), 
        ['pets' => $pets]);
    }

    public function show(Pet $pet)
    {

        return view('catalog.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {

        return view('catalog.edit', compact('pet'));
    }

   

}


