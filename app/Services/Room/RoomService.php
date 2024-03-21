<?php

namespace App\Services\Room;

use App\Helpers\FileHelpers;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class RoomService
{

    public function validateRoomRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'room_category_id' => 'required',
            // 'hotel_id' => 'required|string',
            'image' => 'required|string',
            'rate' => 'required|string',
            'discounted_rate' => 'required|string|max:20',
            'description' => 'required|string',
            'photo' => 'nullable|max:2048',
        ]);

        if ($request->fails()) {
            return redirect()->back()->withErrors(request())->withInput();
        }
    }



    public function createHotelRoom($data)
    {
        $data = self::validateRoomRequest($data);
        // $imagePath = null;
        if (!empty($image = $data['image'] ?? null)) {
            $photoDirectory = 'hotel/room/image/';
            Storage::disk('public')->makeDirectory($photoDirectory);
            $data = FileHelpers::saveImageRequest($image, $photoDirectory);
        }
        $data['hotel_id'] = '1';
        Room::create($data);
        return $data;
    }



    public function updateHotelRoom($id)
    {
        //
    }
}
