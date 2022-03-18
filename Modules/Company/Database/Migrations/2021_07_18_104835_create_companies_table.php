<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('organization_type', ['Private', 'Public', 'Government', 'NGO', 'Others', 'Agencies']);
            $table->string('established_at')->nullable();
            $table->string('website', 180)->nullable();
            $table->string('team_size', 180)->nullable();
            $table->string('industry_type', 80)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->boolean('visibility')->default(true);
            $table->string('logo', 180)->nullable();
            $table->string('banner', 180)->nullable();
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
        Schema::dropIfExists('companies');
    }
}
