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
    { //'name', 'email', 'phone', 'rec_name', 'rec_email', 'rec_phone', 'rec_address_1', 'rec_address_2', 'message','status',
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('user_id');
            $table->string('rec_name');
            $table->string('rec_email');
            $table->string('rec_phone');
            $table->string('rec_address_1');
            $table->string('rec_address_2');
            $table->string('message')->nullable();
            $table->string('status')->default(0);
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
