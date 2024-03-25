<?php

namespace App\Http\Controllers\Dashboard\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Guest $model)
    {
        return view('dashboard.guest.index', [
            'guests' => $model->where('hotel_id', auth()->user()->hotel_id)->withTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $guest = Guest::findOrFail($id);
        return view('dashboard.guest.edit', [
            'guest' => $guest,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest)
    {
        $guest->update($request->all());
        return redirect()->route('dashboard.hotel.guest.index')->with('success_message', 'Guest Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest= Guest::findOrFail($id);
        $guest->delete();
        return redirect()->route('dashboard.hotel.guest.index')->with('success_message', 'Guest Deleted Successfully');
    }

    public function restore(string $id)
    {
        $guest = Guest::withTrashed()->findOrFail($id);
        $guest->restore();
        return redirect()->route('dashboard.hotel.guest.index')->with('success', 'Guest restored successfully.');
    }
}
