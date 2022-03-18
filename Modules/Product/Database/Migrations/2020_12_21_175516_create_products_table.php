<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->bigInteger('sku');
            $table->string('image')->nullable();
            $table->integer('price');
            $table->integer('sale_price')->nullable();
            $table->integer('handling_time')->nullable();
            $table->integer('shipping_cost')->nullable();
            $table->integer('total_orders')->default(0);
            $table->integer('total_favourites')->default(0);
            $table->boolean('status')->default(true);
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
