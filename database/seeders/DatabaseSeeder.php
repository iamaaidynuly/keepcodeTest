<?php

namespace Database\Seeders;

use App\Models\User;
use App\Module\Market\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();

         Product::factory(20)->create();
    }
}
