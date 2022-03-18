<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priceplans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_type');
            $table->string('level');
            $table->string('price');
            $table->string('discount_price');
            $table->string('short_description');
            $table->longText('long_description');
            $table->tinyInteger('status')->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->boolean('is_recommonded')->default(0);
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
        Schema::dropIfExists('priceplans');
    }
}
