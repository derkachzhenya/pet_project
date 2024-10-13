<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Category;
use App\Models\Categoryage;
use Illuminate\Http\Request;
use App\Models\Categorycolor;
use App\Models\Categorylocal;
use App\Models\Categoryvariety;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $pets = Pet::where('user_id', $user->id)->get();
        $activePetsCount = $pets->where('status', 'active')->count();
        $inactivePetsCount = $pets->where('status', 'inactive')->count();

        return view('dashboard', compact('pets', 'activePetsCount', 'inactivePetsCount'));
    }

    public function show(Pet $pet)
    {
        $categorylocals = Categorylocal::all();
        return view('dashboard.show', compact('pet', 'categorylocals'));
    }

    public function edit(Pet $pet)
    {

        $categories = Category::all();
        $categoryvarieties = Categoryvariety::all();
        $categoryages = Categoryage::all();
        $categorycolors = Categorycolor::all();
        $categorylocals = Categorylocal::all();
        return view('dashboard.edit', compact(
            'pet',
            'categories',
            'categoryvarieties',
            'categoryages',
            'categorycolors',
            'categorylocals',
        ));
    }

    public function update(Request $request, Pet $pet)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:300',
            'price' => 'required_if:checkbox,0|numeric|min:0',
            'hiking' => 'required|in:Представник притулку,Власник розплідника,Приватний власник',
            'category_id' => 'required|exists:categories,id',
            'categoryvariety_id' => 'required|exists:categoryvarieties,id',
            'gender' => 'required|in:Дівчинка,Хлопчик,Невідомо',
            'age' => 'required|integer|min:0|max:100',
            'categoryage_id' => 'required|exists:categoryages,id',
            'categorycolor_id' => 'required|exists:categorycolors,id',
            'categorylocal_id' => 'required|exists:categorylocals,id',
            // добавьте другие поля по необходимости
        ]);

        $pet->update($validatedData);

        // Обновление чекбоксов
        $pet->chip = $request->has('chip');
        $pet->sterilization = $request->has('sterilization');
        $pet->vaccination = $request->has('vaccination');
        $pet->processing = $request->has('processing');
        $pet->vet_pasport = $request->has('vet_pasport');
        $pet->pedigree = $request->has('pedigree');
        $pet->fci = $request->has('fci');
        $pet->metrics = $request->has('metrics');

        $pet->save();

        return redirect()->route('dashboard.show', $pet)->with('success', 'Pet updated successfully');
    }

    public function deactivate(Pet $pet)
    {
        $pet->status = $pet->status === 'active' ? 'inactive' : 'active';
        $pet->save();

        return redirect()->back()->with('success', 'Статус оголошення змінено');
    }


}
