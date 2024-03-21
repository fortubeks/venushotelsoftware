<?php

namespace App\Http\Controllers\Dashboard\Hotel\Room;

use App\Helpers\FileHelpers;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Services\Room\RoomService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Room $model)
    {
        return view('dashboard.room.index', [
            'rooms' => $model->where('hotel_id', auth()->user()->hotel_id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomCategories = RoomCategory::get();
        return view('dashboard.room.create', [
            'roomCategories' => $roomCategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // if ($request->hasFile('image')) {
        //     $photoDirectory = 'hotel/room/image/';
        //     Storage::disk('public')->makeDirectory($photoDirectory);
        //     $image = FileHelpers::saveImageRequest($request->file('image'), $photoDirectory);
        // }
        $request->merge(['hotel_id' => auth()->user()->hotel_id]);
        $room = Room::create($request->all());
        return redirect()->route('dashboard.hotel.room.index')->with('success_message', 'User Created Successfully');

        //  try {
        //     (new RoomService)->createHotelRoom($request->all());
        //     return redirect()->route('dashboard.hotel.room.index')->with('success_message', 'User Created Successfully');
        // } catch (Exception $e) {
        //     return redirect()->back()->with('error_message', 'An error occurred while creating the room.' . $e->getMessage());
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
        $roomCategories = RoomCategory::get();
        $room = Room::findOrFail($id);
        return view('dashboard.room.edit', [
            'room' => $room,
            'roomCategories' => $roomCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $room->update($request->all());
        return redirect()->route('dashboard.hotel.room.index')->with('success_message', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('dashboard.hotel.room.index')->with('success_message', 'User Deleted Successfully');
    }
}
