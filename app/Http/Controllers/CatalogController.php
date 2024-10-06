<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Catalog;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;

class CatalogController extends Controller
{
  
    public function index()
    {
        $pets = Pet::with('user')->latest()->paginate(10);
        return view('catalog.index', ['pets' => $pets]);
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
