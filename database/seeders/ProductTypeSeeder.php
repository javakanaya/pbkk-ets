<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductType::create([
            'name' => 'Electronic ',
        ]);
        ProductType::create([
            'name' => 'Fashion ',
        ]);
        ProductType::create([
            'name' => 'Food ',
        ]);
        ProductType::create([
            'name' => 'Automotive ',
        ]);
        ProductType::create([
            'name' => 'Beauty ',
        ]);
    }
}
