<?php

namespace Database\Seeders;

use App\Models\ProductCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCondition::create([
            'name' => 'Good ',
        ]);
        ProductCondition::create([
            'name' => 'Decent ',
        ]);
        ProductCondition::create([
            'name' => 'Bad ',
        ]);
    }
}
