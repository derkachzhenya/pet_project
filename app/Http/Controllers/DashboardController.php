<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    return view('dashboard', ['pets' => Pet::with('user')->latest()->get()]);
}

public function show(Pet $pet)
{
    
    return view('dashboard.show', compact('pet'));
}

public function edit(Pet $pet)
{
    
    return view('dashboard.edit', compact('pet'));
}


}
