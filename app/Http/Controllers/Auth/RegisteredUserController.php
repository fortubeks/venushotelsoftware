<?php

namespace App\Http\Controllers\Auth;

use App\Constants\AppConstants;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $name = null): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Split the full name into first name and last name
        $names = explode(' ', $request['name'], 2);
        $firstName = $names[0];
        $lastName = isset($names[1]) ? $names[1] : '';

        $user = User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $request['email'],
            'role' => AppConstants::SUPER_USER,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));

        Auth::login($user);


        return redirect(route('dashboard.home', absolute: false));
    }
}
