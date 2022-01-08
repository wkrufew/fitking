<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Crear Planes',
        ]);

        Permission::create([
            'name' => 'Leer Planes',
        ]);

        Permission::create([
            'name' => 'Actualizar Planes',
        ]);

        Permission::create([
            'name' => 'Eliminar Planes',
        ]);

        Permission::create([
            'name' => 'Ver Dashboard',
        ]);

        Permission::create([
            'name' => 'Crear Rol',
        ]);

        Permission::create([
            'name' => 'Listar Rol',
        ]);

        Permission::create([
            'name' => 'Actualizar Rol',
        ]);

        Permission::create([
            'name' => 'Eliminar Rol',
        ]);

        Permission::create([
            'name' => 'Leer Usuario',
        ]);

        Permission::create([
            'name' => 'Actualizar Usuario',
        ]);
    }
}
