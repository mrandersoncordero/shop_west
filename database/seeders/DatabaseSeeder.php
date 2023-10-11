<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        /**
         * Categorias
         */
        Category::create([
            'name' => 'Pegamentos',
            'description' => 'Descripcion de pegamentos'
        ]);
        Category::create([
            'name' => 'Construccion',
            'description' => 'Descripcion de construccion'
        ]);
        Category::create([
            'name' => 'Sella Juntas',
            'description' => 'Descripcion de sella juntas'
        ]);
        /**
         * Subcategorias
         */
        Subcategory::create([
            'name' => 'Basicos',
            'category_id' => 1,
            'description' => 'Descripcion de subcategoria basicos'
        ]);
        Subcategory::create([
            'name' => 'Profesional',
            'category_id' => 1,
            'description' => 'Descripcion de subcategoria profesional'
        ]);
        Subcategory::create([
            'name' => 'Flexible',
            'category_id' => 1,
            'description' => 'Descripcion de subcategoria Flexible'
        ]);
        Subcategory::create([
            'name' => 'Revestimiento',
            'category_id' => 2,
            'description' => 'Descripcion de subcategoria revestimiento'
        ]);
        Subcategory::create([
            'name' => 'Pegamentos',
            'category_id' => 2,
            'description' => 'Descripcion de subcategoria Pegamentos'
        ]);
        Subcategory::create([
            'name' => 'Estructural',
            'category_id' => 2,
            'description' => 'Descripcion de subcategoria Estructural'
        ]);
        Subcategory::create([
            'name' => 'Sella juntas',
            'category_id' => 3,
            'description' => 'Descripcion de subcategoria Sella juntas'
        ]);
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
