<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->integer('company_id');
            // $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('phone');
            $table->string('email');
            $table->string('website_link');
            $table->text('address');
            $table->string('thumbnail')->default('backend/image/default-post.png');
            $table->string('gender');
            $table->string('expired_at');
            $table->string('salary_range');
            $table->string('map_address');
            $table->string('job_type');
            $table->string('education');
            $table->string('experience');
            $table->string('short_description');
            $table->longText('long_description');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('jobs');
    }
}
