<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Categoryage;
use Illuminate\Http\Request;
use App\Models\Categorylocal;
use App\Models\Categoryvariety;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;

class CatalogController extends Controller
{

    public function index(Request $request)
    {
        $query = Pet::with('user');

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    if ($request->filled('categoryvariety_id')) {
        $query->where('categoryvariety_id', $request->categoryvariety_id);
    }

    if ($request->filled('categorylocal_id')) {
        $query->where('categorylocal_id', $request->categorylocal_id);
    }

    if ($request->filled('categoryage_id')) {
        $query->where('categoryage_id', $request->categoryage_id);
    }

    if ($request->filled('gender')) {
        $query->where('gender', $request->gender);
    }

    // Фильтрация по цене
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    if ($request->has('free')) {
        $query->where('price', 0);
    }
    
  
   

    $pets = $query->latest()->paginate(1);
    $categories = Category::all();
    $categoryvarieties = Categoryvariety::all();
    $categorylocals = Categorylocal::all();
    $categoryages = Categoryage::all();

    return view('catalog.index', compact('pets', 'categories', 'categoryvarieties', 
    'categorylocals', 'categoryages'));
    }

  

    public function create()
    {
        //
    }


    public function store(StoreCatalogRequest $request)
    {
        //
    }


    public function show(Catalog $catalog)
    {
        return view('catalog.show');
    }


    public function edit(Catalog $catalog)
    {
        //
    }


    public function update(UpdateCatalogRequest $request, Catalog $catalog)
    {
        //
    }


    public function destroy(Catalog $catalog)
    {
        //
    }
}
