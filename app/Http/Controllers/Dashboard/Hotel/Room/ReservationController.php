<?php

namespace App\Http\Controllers\Dashboard\Hotel\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\GuestStoreRequest;
use App\Models\Guest;
use App\Models\Room;
use App\Models\RoomReservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::all();
        return view('dashboard.room-reservation.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['hotel_id' => auth()->user()->hotel_id, 'user_id' => auth()->user()->id]);
        $guest = session('guest');
        if ($guest == null) {
            (new GuestStoreRequest())->rules();
            $guest = Guest::create($request->all());
        }
        $request->merge(['guest_id' => $guest->id]);
        foreach ($request->room as $room) {
            //confirm that the room is available on the selected dates & they have not selected same room twice
            //if it is not then return a message with the room number
        }
        foreach ($request->room as $key => $room) {
           
            //save reservation
            $request->merge(['room_id' => $room]);
            $rate = $request->rate[$key];
            $request->merge(['rate' => $rate]);
            $totalAmount = 0;
            $totalAmount += $rate;
            $request->merge(['total_amount' => $totalAmount]);
            // dd($request->all());
            $reservation = RoomReservation::create($request->all());
        }

        return redirect('/')->with('success', 'Reservation added successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
