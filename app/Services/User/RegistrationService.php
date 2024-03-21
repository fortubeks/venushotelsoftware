<?php

namespace App\Services\User;

use App\Helpers\FileHelpers;
use App\Mail\SendUserLoginDetailsMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RegistrationService
{

    public function validateUser(array $request, $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => 'required',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|max:2048',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return $validator->validated();
    }



    public function createUser($id)
    {
        $request = request();

        // Extract data from the request object
        $requestData = $request->all();
    
        // Validate the incoming form data
        $data = $this->validateUser($requestData);

        $photoPath = null;
        if (!empty($photo = $data['image'] ?? null)) {
            $photoDirectory = 'users/photos/';
            Storage::disk('public')->makeDirectory($photoDirectory);
            $photoPath = FileHelpers::saveImageRequest($photo, $photoDirectory);
        }
        // Generate a random password
        $randomPassword = Str::random(12);
        $user = Auth::user()->hotel->id;
        // Create the user with form data
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'photo' => $photoPath,
            'address' => $request->input('address'),
            'role' => $request->input('role'),
            'password' => Hash::make($randomPassword),
            'user_account_id' => $user,
            'hotel_id' => $user
        ]);

        // Send login details
        $this->sendLoginDetails($user->id, $randomPassword);

        return $user;
    }



    public function updateUser($id)
    {
        $request = request();
        $this->validateUser($request, $id);

        $user = User::findOrFail($id);

        if (request()->hasFile('photo')) {
            $photoDirectory = 'users/photos/';
            Storage::disk('public')->makeDirectory($photoDirectory);
            $photoPath = FileHelpers::saveImageRequest(request()->file('photo'), $photoDirectory);
            $request['photo'] = $photoPath;
        } else {
            // If no new photo is uploaded, retain the existing photo path
            $request['photo'] = $user->photo;
        }
        dd($request->all());
        if ($request->input('email') !== $user->email) {
            $user->email = $request->input('email');
        }

        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'photo' => $photoPath,
            'address' => $request->input('address'),
            'role' => $request->input('role'),
            'user_account_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success_message', 'User information updated successfully.');
    }

    public function sendLoginDetails($userId)
    {
        try {
            $user = User::findOrFail($userId);

            $randomPassword = Str::random(12);

            $user->password = Hash::make($randomPassword);
            $user->save();

            Mail::to($user->email)->send(new SendUserLoginDetailsMail($user, $randomPassword));

            return $user->toArray();
        } catch (Exception $e) {
            // Handle the exception as per your requirement
            return ['error_message' => 'An error occurred while updating the user.'];
        }
    }
}
