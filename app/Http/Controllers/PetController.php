<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Category;
use App\Models\Categoryage;
use Illuminate\Http\Request;
use App\Models\Categorycolor;
use App\Models\Categorylocal;
use App\Models\Categoryvariety;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Http\Requests\StoreTwoPetRequest;
use App\Http\Requests\AddPetStepThreeRequest;

class PetController extends Controller
{

    public function index()
    {
        $categories = Category::all();  
        $categorylocals = Categorylocal::all();
        return view('pets.create-step-one', compact('categories', 'categorylocals'));
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
        $pet->hiking = $data['hiking'];

        $pet->save();

        $request->session()->put('pet', $pet);

        return redirect()->route('pet.create.step.two');
    }

    public function createStepTwo(Request $request)
    {
        $pet = $request->session()->get('pet');
        $categoryvarieties = Categoryvariety::all();
        $categoryages = Categoryage::all();
        return view('pets.create-step-two', compact('pet', 'categoryvarieties', 'categoryages'));
    }

    public function postCreateStepTwo(StoreTwoPetRequest $request)
    {
        $validatedData = $request->validated();

        $pet = $request->session()->get('pet');
    

        if (!$pet) {
            return redirect()->route('pet.create.step.one')
                ->with('error', 'Pet information not found. Please start from the beginning.');
        }


        $pet->categoryvariety_id = $validatedData['categoryvariety_id'];
        $pet->age = $validatedData['age'];
        $pet->categoryage_id = $validatedData['categoryage_id'];
        $pet->gender = $validatedData['gender'];

        $pet->sterilization = $validatedData['sterilization'] ?? false;
        $pet->vaccination = $validatedData['vaccination'] ?? false;
        $pet->chip = $validatedData['chip'] ?? false;
        $pet->processing = $validatedData['processing'] ?? false;

        $pet->vet_pasport = $validatedData['vet_pasport'] ?? false;
        $pet->pedigree = $validatedData['pedigree'] ?? false;
        $pet->fci = $validatedData['fci'] ?? false;
        $pet->metrics = $validatedData['metrics'] ?? false;


        $request->session()->put('pet', $pet);

        return redirect()->route('pet.create.step.three');
    }



    public function createStepThree(Request $request)
    {
        $pet = $request->session()->get('pet');
        $categorycolors = Categorycolor::all();
        return view('pets.create-step-three', compact('pet', 'categorycolors'));
    }

    public function postCreateStepThree(AddPetStepThreeRequest $request)
    {
        $validatedData = $request->validated();

        $pet = $request->session()->get('pet');
    

        if (!$pet) {

            return redirect()->route('pet.create.step.one')->with('error', 'Информация о питомце не найдена. Пожалуйста, начните сначала.');
        }
  
        $pet->description = $validatedData['description'];
        $pet->categorycolor_id = $validatedData['categorycolor_id'];
        $pet->save();


        $request->session()->put('pet', $pet);

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
