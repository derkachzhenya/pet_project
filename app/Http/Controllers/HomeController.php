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
      
        $categories = Category::all();
        $categorylocals = Categorylocal::all();
        $pets = Pet::with('user')->latest()->get();
        return view('welcome', compact('categorylocals', 'categories'), ['pets' => $pets]);
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


