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
            $table->unsignedBigInteger('central_product_id')->nullable();
            $table->string('name');
            $table->text('image')->nullable();
            $table->string('image_storage_type')->default('tenant');
            $table->text('description')->nullable();
            $table->integer('price')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_central_product')->default(false);
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
