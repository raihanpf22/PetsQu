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
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('order_user_id');
            $table->foreign('order_user_id')->references('user_id')->on('users');
            $table->integer('ammount');
            $table->string('order_address');
            $table->foreign('order_address')->references('user_address')->on('users');
            $table->string('order_email');
            $table->foreign('order_email')->references('email')->on('users');
            $table->string('order_status');
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
