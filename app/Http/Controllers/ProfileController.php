<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
  
    
    public function edit(Request $request): View
    {
        $user = $request->user();
    
    // Получаем объявления пользователя
    $pets = Pet::with('user')->where('user_id', $user->id)->latest()->get();

    // Считаем количество активных и неактивных объявлений
    $activePetsCount = $pets->where('status', 'active')->count();
    $inactivePetsCount = $pets->where('status', 'inactive')->count();

    // Передаем эти данные в представление
    return view('profile.edit', [
        'user' => $user,
        'pets' => $pets,
        'activePetsCount' => $activePetsCount,
        'inactivePetsCount' => $inactivePetsCount,
    ]);
    }

   
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
