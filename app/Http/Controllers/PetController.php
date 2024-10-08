<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;

class PetController extends Controller
{

    public function index()
    {
        return view('pets.create-step-one');
    }

    public function createStepOne(Request $request)
    {
        $pet = $request->session()->get('pet');
        return view('pets.create-step-one', compact('pet'));
    }

    public function postCreateStepOne(StorePetRequest $request)
    {
        $data = $request->validated();
        $pet = $request->user()->pets()->create($data);

        // Сохраняем pet в сессию
        $request->session()->put('pet', $pet);

        return redirect()->route('pet.create.step.two');
    }

    public function createStepTwo(Request $request)
    {
        $pet = $request->session()->get('pet');
        return view('pets.create-step-two', compact('pet'));
    }

    public function postCreateStepTwo(Request $request)
    {
        return redirect()->route('pet.create.step.three');
    }

    public function createStepThree(Request $request)
    {
        $pet = $request->session()->get('pet');
        return view('pets.create-step-three', compact('pet'));
    }

    public function postCreateStepThree(Request $request)
    {
        return redirect()->route('pet.create.step.four');
    }

    public function createStepFour(Request $request)
    {
        $pet = $request->session()->get('pet');
        return view('pets.create-step-four', compact('pet'));
    }

    public function postCreateStepFour(Request $request)
    {
        // Завершение процесса, перенаправляем на главную страницу
        return redirect()->route('dashboard');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
