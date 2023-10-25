<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PaymentType::create(['name' => 'Punto de venta']);
        PaymentType::create(['name' => 'Divisas en efectivo']);
        PaymentType::create(['name' => 'Transferencia bancaria']);
        PaymentType::create(['name' => 'Pago movil']);

    }
}
