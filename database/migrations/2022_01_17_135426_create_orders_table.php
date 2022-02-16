<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('no_telp');
            $table->text('message')->nullable();
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('pos_code');
            $table->text('address');
            $table->string('total_price');
            $table->tinyInteger('address_type');
            $table->string('payment_method')->nullable();
            $table->string('payment_id')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('order_code');
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
        Schema::dropIfExists('orders');
    }
}
