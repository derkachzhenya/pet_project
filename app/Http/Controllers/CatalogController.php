<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Categorylocal;
use App\Models\Categoryvariety;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;

class CatalogController extends Controller
{

    public function index()
    {

        $pets = Pet::with('user')->latest()->paginate(9);
        $categories = Category::all();
        $categoryvarieties = Categoryvariety::all();
        $categorylocals = Categorylocal::all();
        return view('catalog.index', compact('categories', 'categoryvarieties', 'categorylocals'), ['pets' => $pets]);
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
