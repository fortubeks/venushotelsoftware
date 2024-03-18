<?php

namespace App\Http\Controllers\Dashboard;

use App\Constants\AppConstants;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\RegistrationService;
use Exception;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate();
        return view('dashboard.user-management.index', [
            'users' => $users,
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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            (new RegistrationService)->createUser($request);
            return redirect()->route('dashboard.users.index')->with('success_message', 'User Created Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', 'An error occurred while creating the user.' . $e->getMessage());
        }
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
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //  dd($request->all());
        try {
            (new RegistrationService)->updateUser($request, $id);
            return redirect()->route('dashboard.users.index')->with('success_message', 'User Updated Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', 'An error occurred while updating the user.' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
