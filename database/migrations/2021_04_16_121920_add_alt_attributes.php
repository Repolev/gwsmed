<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAltAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('image_alt')->nullable();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('image_alt')->nullable();
            $table->string('banner_alt')->nullable();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('image_alt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('image_alt');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('image_alt');
            $table->dropColumn('banner_alt');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('image_alt');
        });
    }
}
