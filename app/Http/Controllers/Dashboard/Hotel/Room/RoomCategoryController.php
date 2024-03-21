<?php

namespace App\Http\Controllers\Dashboard\Hotel\Room;

use App\Http\Controllers\Controller;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoomCategory $model)
    {

        return view('dashboard.room.category.index', [
            'room_categories' =>$model->where('hotel_id', auth()->user()->hotel_id)->get(),
            // 'room_categories' => $model->where('id', 'hotel_id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.room.category.create');
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required',
        ]);
        $request->merge(['hotel_id' => auth()->user()->hotel_id]);
        $category = RoomCategory::create($request->all());
        return redirect()->route('dashboard.hotel.room-category.index')->with('success_message','RoomCategory was added successfully');
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
        $room_category = RoomCategory::findOrFail($id);
       return view('dashboard.room.category.edit', [
        'room_category' => $room_category
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomCategory $room_category)
    {
        $room_category->update($request->all());
        return redirect()->route('dashboard.hotel.room-category.index')->with('success_message','RoomCategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomCategory $room_category)
    {
        $room_category->delete();
        return redirect()->route('dashboard.hotel.room-category.index')->with('success_message','RoomCategory deleted successfully');
    }
}
