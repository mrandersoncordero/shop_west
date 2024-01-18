<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');

            $table->string('code', 80);
            $table->string('name', 80);
            $table->string('description', 500);
            $table->tinyInteger('weight');
            $table->string('format', 100)->nullable();
            $table->string('yield', 100)->nullable();
            $table->string('traffic', 100)->nullable();
            $table->float('price');
            $table->string('image');
            $table->string('url_sheet')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
