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
            $table->bigInteger('category_id');
            $table->string('category_name');
            $table->bigInteger('subcategory_id');
            $table->string('subcategory_name');
            $table->bigInteger('brand_id');
            $table->string('brand_name');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_quantity');
            $table->text('product_details');
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->bigInteger('main_slider')->nullable();
            $table->bigInteger('hot_deal')->nullable();
            $table->bigInteger('best_rated')->nullable();
            $table->bigInteger('mid_slider')->nullable();
            $table->bigInteger('hot_new')->nullable();
            $table->bigInteger('trend')->nullable();
            $table->string('image_one')->nullable();
            $table->bigInteger('status')->nullable();
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
