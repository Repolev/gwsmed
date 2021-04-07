<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('photo')->nullable();
            $table->string('banner_Path')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_parent')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('level')->default(0);
            $table->tinyInteger('on_menu')->default(0);
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
