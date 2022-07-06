<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('avatar')->default('default.jpg')->nullable();
            $table->string('name')->nullable();
            $table->string('matric')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('faculty')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('choice')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
