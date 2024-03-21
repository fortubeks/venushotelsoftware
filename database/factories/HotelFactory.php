<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageDirectory = glob(public_path('dashboard/assets/images/rooms/*'));
        $image = basename( $imageDirectory[array_rand( $imageDirectory)]);

        // Pick the first 1 images from the shuffled array
        $randomImage = $image;

        $destinationPath = 'hotel/room/images/';

        // Check if the file already exists in storage
        if (Storage::disk('public')->exists($destinationPath)) {
            // If it exists, delete it
            Storage::disk('public')->delete($destinationPath);
        }

        // Store the image in the storage directory
        Storage::disk('public')->put($destinationPath, $image);

        return [
            'user_id' => mt_rand(1,5),
            'name' => fake()->name(),
            'number_of_rooms' => fake()->randomNumber(),
            'state_id' => '1',
            'country_id' => '1',
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'logo' =>  $randomImage,
            'website' => 'https://www.example.com',
        ];
    }
}
