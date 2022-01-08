<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Smith Aviles',
            'email' => 'smithva@hotmail.es',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('Administrador');
        User::factory(99)->create();
    }
}
