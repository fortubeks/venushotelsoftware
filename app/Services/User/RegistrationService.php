<?php

namespace App\Services\User;

use App\Helpers\FileHelpers;
use App\Mail\SendUserLoginDetailsMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegistrationService
{

    public function validateUser(Request $request)
    {
        return Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048',
            'address' => 'nullable|string|max:255',
        ])->validate();
    }

    public function createUser()
    {
        $request = request();
        $data = $this->validateUser($request);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoDirectory = 'users/photos/';
            Storage::disk('public')->makeDirectory($photoDirectory);
            $photoPath = FileHelpers::saveImageRequest($request->file('photo'), $photoDirectory);
        }

        // Generate a random password
        $randomPassword = Str::random(12);
        $data['password'] = Hash::make($randomPassword);
        $data['photo'] = $photoPath;
        $user = User::create($data);
        $this->sendLoginDetails($user->id);
        return $data;
    }

    public function updateUser($id)
    {
        $data = $this->validateUser(request());

        if (request()->hasFile('photo')) {
            $photoDirectory = 'users/photos/';
            Storage::disk('public')->makeDirectory($photoDirectory);
            $photoPath = FileHelpers::saveImageRequest(request()->file('photo'), $photoDirectory);
            $data['photo'] = $photoPath;
        }
        $user = User::findOrFail($id);
        $user->update($data);
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

            return $user;
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', 'An error occurred while updating the user.');
        }
    }
}
