<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_products', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('category_id');            
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            //$table->unsignedBigInteger('product_id');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->boolean('promotion');
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_products');
    }
}
