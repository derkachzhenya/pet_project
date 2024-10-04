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


}
