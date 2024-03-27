<?php

namespace App\Http\Controllers\Dashboard\Hotel;

use App\Constants\StatusConstants;
use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Venue $model)
    {
        return view('dashboard.venue.index', [
            'venues' => $model->where('hotel_id', auth()->user()->hotel_id)->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.venue.create', [
            'statusOptions' => StatusConstants::ACTIVE_OPTIONS,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Venue $venue)
    {
        $request->merge(['hotel_id' => auth()->user()->hotel_id]);
        $venue->create($request->all());
        return redirect()->route('dashboard.hotel.venue.index')->with('success_message', 'Venue Created Successfully');
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
        return view('dashboard.venue.edit', [
            'venue' => Venue::findOrFail($id),
            'statusOptions' => StatusConstants::ACTIVE_OPTIONS,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge(['hotel_id' => auth()->user()->hotel_id]);
        $venue = Venue::findOrFail($id);
        $venue->update($request->all());
        return redirect()->route('dashboard.hotel.venue.index')->with('success_message', 'Venue Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venue = Venue::findOrFail($id);
        $venue->delete();
        return redirect()->route('dashboard.hotel.venue.index')->with('success', 'Deleted restored successfully.');
    }
}
