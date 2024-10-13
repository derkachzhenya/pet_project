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

        if ($request->filled('gender')) {
            if ($request->gender !== 'unknown') {
                $query->where('gender', $request->gender);
            } else {
                $query->whereNull('gender');
            }
        }

        // Existing filters
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

        // Price filtering
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('free')) {
            $query->where('price', 0);
        }

        // Age filtering
        if ($request->filled('min_age')) {
            $query->where('age', '>=', $request->min_age);
        }

        if ($request->filled('max_age')) {
            $query->where('age', '<=', $request->max_age);
        }

        // Previous new filters
        if ($request->has('sterilization')) {
            $query->where('sterilization', true);
        }

        if ($request->has('vaccination')) {
            $query->where('vaccination', true);
        }

        if ($request->has('chip')) {
            $query->where('chip', true);
        }

        if ($request->has('parasite_treatment')) {
            $query->where('parasite_treatment', true);
        }

        // New filters
        if ($request->has('vet_pasport')) {
            $query->where('vet_pasport', true);
        }

        if ($request->has('pedigree')) {
            $query->where('pedigree', true);
        }

        if ($request->has('fci')) {
            $query->where('fci', true);
        }

        if ($request->has('metrics')) {
            $query->where('metrics', true);
        }

        $pets = $query->latest()->paginate(9);
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
