<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create([
            'name' => 'Gratis',
            'value' => 0
        ]);

        Price::create([
            'name' => '9.99 US$ (Nivel 1)',
            'value' => 9.99
        ]);

        Price::create([
            'name' => '14.99 US$ (Nivel 2)',
            'value' => 14.99
        ]);

        Price::create([
            'name' => '19.99 US$ (Nivel 3)',
            'value' => 19.99
        ]);
    }
}
