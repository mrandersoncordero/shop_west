<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        OrderStatus::create(['name' => 'Aprobado']);
        OrderStatus::create(['name' => 'En proceso']);
        OrderStatus::create(['name' => 'Rechazado']);
        OrderStatus::create(['name' => 'Comprobando pago']);
        OrderStatus::create(['name' => 'Pago comprobado']);
    }
}
