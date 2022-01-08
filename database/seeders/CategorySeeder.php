<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Plan Normal'
        ]);

        Category::create([
            'name' => 'Plan Oro'
        ]);

        Category::create([
            'name' => 'Plan Platinum'
        ]);
    }
}
