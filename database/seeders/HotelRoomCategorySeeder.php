<?php

namespace Database\Seeders;

use App\Models\RoomCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class HotelRoomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageDirectory = glob(public_path('dashboard/assets/images/rooms/*'));
        $image = basename( $imageDirectory[array_rand( $imageDirectory)]);

        // Pick the first 1 images from the shuffled array
        $randomImage = $image;

        $destinationPath = 'hotel/category/images/';

        // Check if the file already exists in storage
        if (Storage::disk('public')->exists($destinationPath)) {
            // If it exists, delete it
            Storage::disk('public')->delete($destinationPath);
        }

        // Store the image in the storage directory
        Storage::disk('public')->put($destinationPath, $image);


        $datas = [
            [
                'image' => $randomImage,
                'name' => 'Appartment',
                'hotel_id' => mt_rand(1,10),
                'description' => 'Category description',
                'rate' => 500000,
                'discounted_rate' => 0,
            ],

            [
                'image' => $randomImage,
                'name' => 'Relaxation',
                'hotel_id' => mt_rand(1,10),
                'description' => 'Category description',
                'rate' => 500000,
                'discounted_rate' => 0,
            ],

            [
                'image' => $randomImage,
                'name' => 'Store',
                'hotel_id' => mt_rand(1,10),
                'description' => 'Category description',
                'rate' => 500000,
                'discounted_rate' => 0,
            ],

            [
                'image' => $randomImage,
                'name' => 'Bar',
                'hotel_id' => mt_rand(1,10),
                'description' => 'Category description',
                'rate' => 500000,
                'discounted_rate' => 0,

            ],

            [
                'image' => $randomImage,
                'name' => 'Resturant',
                'hotel_id' => mt_rand(1,10),
                'description' => 'Category description',
                'rate' => 500000,
                'discounted_rate' => 0,
               
            ],
        ];

        foreach ($datas as $key => $data) {
            RoomCategory::create($data);
        }
    }
}
