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
            $table->id('order_id');
            $table->string('driver_id')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('admin_id')->nullable();
            $table->string('from');
            $table->string('going');
            $table->date('date');
            $table->time('time');
            $table->string('payment_option');
            $table->string('note');
            $table->string('price')->nullable();
            $table->string('order_status')->nullable();
            $table->string('pickup')->nullable();
            $table->string('dropoff')->nullable();
            $table->string('payment')->nullable();
            $table->string('complete')->nullable();
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
