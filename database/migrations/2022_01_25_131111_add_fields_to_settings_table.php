<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->boolean('commingsoon_mode')->default(0)->after('dark_mode');
            $table->boolean('search_engine_indexing')->default(1)->after('dark_mode');
            $table->boolean('google_analytics')->default(0)->after('dark_mode');
            $table->boolean('facebook_pixel')->default(0)->after('dark_mode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('commingsoon_mode');
            $table->dropColumn('search_engine_indexing');
            $table->dropColumn('google_analytics');
            $table->dropColumn('facebook_pixel');
        });
    }
}
