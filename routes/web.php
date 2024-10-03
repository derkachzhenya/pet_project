<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConfidentialityController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('pet/create-step-one', [PetController::class, 'index'])->name('pet.create.step.one');
    Route::post('pet/create-step-one', [PetController::class, 'postCreateStepOne'])->name('pet.create.step.one.post');
    Route::get('pet/create-step-two', [PetController::class, 'createStepTwo'])->name('pet.create.step.two');
    Route::post('pet/create-step-two', [PetController::class, 'postCreateStepTwo'])->name('pet.create.step.two.post');
    Route::get('pet/create-step-three', [PetController::class, 'createStepThree'])->name('pet.create.step.three');
    Route::post('pet/create-step-three', [PetController::class, 'postCreateStepThree'])->name('pet.create.step.three');
});

Route::get('catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('show', [CatalogController::class, 'show'])->name('show.index');
Route::get('confidentiality', [ConfidentialityController::class, 'index'])->name('confidentiality.index');
require __DIR__ . '/auth.php';
