<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email', 30)->unique();
            $table->string('password')->nullable();
            $table->boolean('status')->default(1);
            $table->string('profession')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('website', 180)->nullable();
            $table->boolean('visibility')->default(true);
            $table->string('avatar', 180)->nullable();
            $table->string('file', 180)->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address', 180)->nullable();
            $table->string('map_Address')->nullable();
            $table->string('phone')->nullable();
            $table->longText('bio')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
