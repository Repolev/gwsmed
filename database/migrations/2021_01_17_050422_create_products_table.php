<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('title');
            $table->string('model_no')->unique();
            $table->string('slug')->unique();
            $table->mediumText('summary');
            $table->longText('description')->nullable();
//            $table->longText('specification')->nullable();
            $table->integer('stock')->default(0);
//            $table->unsignedBigInteger('brand_id')->nullable();
//            $table->unsignedBigInteger('display_id')->nullable();
            $table->text('photo');
            $table->text('image_path');
//            $table->text('variants')->nullable();
//            $table->text('variants_path')->nullable();

            $table->float('price')->default(0);
            $table->float('offer_price')->default(0);
            $table->float('discount')->nullable()->default(0);
            $table->enum('tags',['new','hot','sale'])->nullable();
            $table->boolean('is_featured')->default(false);
//            $table->boolean('todays_deal')->default(false);
            $table->enum('status',['active','inactive'])->default('active');
            $table->text('meta_tag')->nullable();

//            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
