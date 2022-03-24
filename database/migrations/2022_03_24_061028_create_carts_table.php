<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //'user_id', 'product_id', 'quantity', 'status',
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cart_id');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->integer('order_id')->nullable();
            $table->integer('quantity');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('carts');
    }
}
