<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdersProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_product', function (Blueprint $table) {
            $table->id();

           
            $table->integer('orders_id')->unsigned();
            $table->foreign('orders_id')
                ->references('id')->on('orders');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')->on('product');

            $table->integer('quantity');
            $table->string('price');
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_product');
    }
}
