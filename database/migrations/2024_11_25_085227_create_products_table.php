<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->nullable();
            $table->string('sku')->unique();
            $table->string('barcode')->nullable();
            $table->string('barcode_image')->nullable();
            $table->integer('stock')->default(0);
            $table->decimal('price', 15, 2);
            $table->text('description')->nullable();
            $table->string('storage_location')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
