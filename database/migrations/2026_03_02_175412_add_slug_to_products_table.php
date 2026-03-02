<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug', 120)->nullable()->unique()->after('name');
        });

        // Generar slug para registros existentes en producción
        \App\Models\Product::all()->each(function ($product) {
            $product->update(['slug' => Str::slug($product->name)]);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('slug', 120)->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
