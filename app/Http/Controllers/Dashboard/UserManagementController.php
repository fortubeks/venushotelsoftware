<?php

namespace App\Http\Controllers\Dashboard;

use App\Constants\AppConstants;
use App\Constants\StatusConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\HotelUser\CreateHotelUserRequest;
use App\Http\Requests\HotelUser\UpdateHotelUserRequest;
use App\Mail\SendUserLoginDetailsMail;
use App\Models\Hotel;
use App\Models\User;
use App\Services\User\RegistrationService;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel = auth()->user()->hotel;
        $users = $hotel->where('id', $hotel->id);
        $users = auth()->user()->users;
        // dd($users);
        return view('dashboard.user-management.index', [
            'users' => $users,
            'hotel' => $hotel,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = AppConstants::ROLE_OPTIONS;
        return view('dashboard.user-management.create', [
            'roles' => $roles,
            'statusOptions' => StatusConstants::ACTIVE_OPTIONS,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateHotelUserRequest $request)
    {
        $user = User::create($request->all());
        $password = $user->password;
        Mail::to($user->email)->send(new SendUserLoginDetailsMail($user, $password));
        return redirect()->route('dashboard.hotel.users.index')->with('success_message', 'User Created Successfully');
        


        // try {
        //     (new RegistrationService)->createUser($request);
        //     return redirect()->route('dashboard.users.index')->with('success_message', 'User Created Successfully');
        // } catch (Exception $e) {
        //     return redirect()->back()->with('error_message', 'An error occurred while creating the user.' . $e->getMessage());
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = AppConstants::ROLE_OPTIONS;
        $user = User::findOrFail($id);
        return view('dashboard.user-management.edit', [
            'user' => $user,
            'roles' => $roles,
            'statusOptions' => StatusConstants::ACTIVE_OPTIONS,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('dashboard.hotel.users.index')->with('success_message', 'User updated Successfully');
        
        // try {
        //     (new RegistrationService)->updateUser($request, $id);
        //     return redirect()->route('dashboard.users.index')->with('success_message', 'User Updated Successfully');
        // } catch (Exception $e) {
        //     return redirect()->back()->with('error_message', 'An error occurred while updating the user.' . $e->getMessage());
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success_message', 'User deleted successfully');
    }

    public function loginDetails($user)
    {
        (new RegistrationService)->sendLoginDetails($user);
        return redirect()->route('dashboard.users.index')->with('success_message', 'Login details sent successfully.');
    }
}
