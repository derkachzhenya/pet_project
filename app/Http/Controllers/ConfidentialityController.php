<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfidentialityController extends Controller
{
    public function index()
    {
        return view('confidentiality.index');
    }
}
