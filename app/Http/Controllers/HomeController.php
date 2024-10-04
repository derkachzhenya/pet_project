<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pets = Pet::with('user')->latest()->get();
        return view('welcome', ['pets' => $pets]);
    }

    public function show(Pet $pet)
    {
        
        return view('catalog.show', compact('pet'));
    }
}


