<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categorias
        Permission::create(['name' => 'Ver categorias']);
        Permission::create(['name' => 'Crear categorias']);
        Permission::create(['name' => 'Editar categorias']);
        Permission::create(['name' => 'Eliminar categorias']);
        // Subcategorias
        Permission::create(['name' => 'Ver subcategorias']);
        Permission::create(['name' => 'Crear subcategorias']);
        Permission::create(['name' => 'Editar subcategorias']);
        Permission::create(['name' => 'Eliminar subcategorias']);
        // Productos
        Permission::create(['name' => 'Ver productos']);
        Permission::create(['name' => 'Crear productos']);
        Permission::create(['name' => 'Editar productos']);
        Permission::create(['name' => 'Eliminar productos']);
        // Ordenes de compra
        Permission::create(['name' => 'Ver Ordenes de compra']);
        Permission::create(['name' => 'ver detalle de la orden de compra']);
        Permission::create(['name' => 'Eliminar Ordenes de compra']);
        Permission::create(['name' => 'Cambiar estado de la orden de compra']);
        // Pagos
        Permission::create(['name' => 'Ver pagos']);
        // Usuarios
        Permission::create(['name' => 'Ver usuarios']);
        Permission::create(['name' => 'Crear usuarios']);
        Permission::create(['name' => 'Editar usuarios']);
        Permission::create(['name' => 'Eliminar usuarios']);
    }
}
