<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->string('slug', 100)->nullable()->unique()->after('name');
        });

        // Generar slug para registros existentes en producción
        \App\Models\Subcategory::all()->each(function ($subcategory) {
            $subcategory->update(['slug' => Str::slug($subcategory->name)]);
        });

        Schema::table('subcategories', function (Blueprint $table) {
            $table->string('slug', 100)->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
