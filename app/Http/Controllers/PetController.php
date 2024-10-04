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
  
        return view('pets.create-step-two',compact('pet'));
    }

    public function postCreateStepOne(StorePetRequest $request)
    {


        $data = $request->validated();
        $request->user()->pets()->create($data);
        // $validatedData = $request->validate([
        //     'name' => 'required|unique:products',
        //     'amount' => 'required|numeric',
        //     'description' => 'required',
        // ]);
  
        // if(empty($request->session()->get('product'))){
        //     $product = new Pet();
        //     $product->fill($validatedData);
        //     $request->session()->put('product', $product);
        // }else{
        //     $product = $request->session()->get('product');
        //     $product->fill($validatedData);
        //     $request->session()->put('product', $product);
        // }
  
        return redirect()->route('pet.create.step.two');
    }
  
 


    public function createStepTwo(Request $request)
    {
        $product = $request->session()->get('product');
  
        return view('pets.create-step-two',compact('product'));
    }

    public function postCreateStepTwo(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|unique:products',
        //     'amount' => 'required|numeric',
        //     'description' => 'required',
        // ]);
  
        // if(empty($request->session()->get('product'))){
        //     $product = new Pet();
        //     $product->fill($validatedData);
        //     $request->session()->put('product', $product);
        // }else{
        //     $product = $request->session()->get('product');
        //     $product->fill($validatedData);
        //     $request->session()->put('product', $product);
        // }
  
        return redirect()->route('pet.create.step.three');
    }
  



 
    public function createStepThree(Request $request)
    {
        $pet = $request->session()->get('pet');
  
        return view('pets.create-step-three',compact('pet'));
    }

    public function postCreateStepThree(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|unique:products',
        //     'amount' => 'required|numeric',
        //     'description' => 'required',
        // ]);
  
        // if(empty($request->session()->get('product'))){
        //     $product = new Pet();
        //     $product->fill($validatedData);
        //     $request->session()->put('product', $product);
        // }else{
        //     $product = $request->session()->get('product');
        //     $product->fill($validatedData);
        //     $request->session()->put('product', $product);
        // }
  
        return redirect()->route('pet.create.step.three');
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
