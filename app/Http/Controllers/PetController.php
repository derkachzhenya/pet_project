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
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('images', 'public');
            $pet->main_image = $path;
        }

        if ($request->hasFile('image_one')) {
            $path = $request->file('image_one')->store('images', 'public');
            $pet->image_one = $path;
        }

        if ($request->hasFile('image_two')) {
            $path = $request->file('image_two')->store('images', 'public');
            $pet->image_two = $path;
        }

        if ($request->hasFile('image_three')) {
            $path = $request->file('image_three')->store('images', 'public');
            $pet->image_three = $path;
        }

        if ($request->hasFile('image_four')) {
            $path = $request->file('image_four')->store('images', 'public');
            $pet->image_four = $path;
        }

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



    public function indexAll(Request $request)
    {
        $query = Pet::query();

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('categorylocal_id')) {
            $query->where('categorylocal_id', $request->categorylocal_id);
        }

        // Добавьте дополнительные фильтры по необходимости, например:
        if ($request->filled('categoryage_id')) {
            $query->where('categoryage_id', $request->categoryage_id);
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        $pets = $query->latest()->paginate(12);
        $categories = Category::all();
        $categorylocals = Categorylocal::all();
        $categoryages = Categoryage::all(); // Добавьте это, если хотите фильтровать по возрасту

        return view('pets.index', compact('pets', 'categories', 'categorylocals', 'categoryages'));
    }


    public function deactivate(Pet $pet)
    {
        $pet->status = $pet->status === 'active' ? 'inactive' : 'active';
        $pet->save();

        return redirect()->back()->with('success', 'Статус оголошення змінено');
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
