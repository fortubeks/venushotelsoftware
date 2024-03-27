<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Helpers\FileHelpers;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelSettingsController extends Controller
{
    public function settings()
    {
        return view('dashboard.settings.index');
    }
    public function details(Hotel $hotel)
    {
        return view('dashboard.settings.hotel-information', [
            'hotel' => $hotel->where('id', auth()->user()->hotel_id)->first()
        ]);
    }

    public function updateHotelInfo(Request $request, string $id)
    {
        if($request->hasFile('logo')){
            $logoPath = FileHelpers::saveImageRequest($request->file('logo'), 'hotel/logos/');
            $request->merge([$logo['logo'] = $logoPath]);
        }
        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());
        return back()->with('success_message', 'Hotel Information updated Successfully');
        
    }
}
