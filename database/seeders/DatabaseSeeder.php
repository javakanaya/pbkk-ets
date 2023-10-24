<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductTypeSeeder;
use Database\Seeders\ProductConditionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::factory()->count(2)->create();
        Product::factory()->count(10)->create();

        $this->call([
            ProductConditionSeeder::class,
            ProductTypeSeeder::class,
        ]);
    }
}
