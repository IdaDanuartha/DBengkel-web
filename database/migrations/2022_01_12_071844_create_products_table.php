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
            $table->bigInteger('review_id')->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('ori_price');
            $table->string('disc_price')->nullable();
            $table->string('main_image');
            $table->string('quantity');
            // $table->string('tax');
            $table->tinyInteger('status');
            $table->tinyInteger('trending');
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
