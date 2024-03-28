<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\PurchaseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all hotel IDs
        $hotelIds = Hotel::pluck('id')->toArray();

        $categories = [
            ['name' => 'Food'],
            ['name' => 'Drink'],
            ['name' => 'House Keeping'],
            ['name' => 'Maintenance'],
            ['name' => 'Staff'],
            ['name' => 'Admin/Stationery'],
            ['name' => 'Others'],
        ];

        foreach ($categories as $category) {
            // Randomly select a hotel_id from the available hotel IDs
            $category['hotel_id'] = $hotelIds[array_rand($hotelIds)];
            PurchaseCategory::create($category);
        }
    }
}
