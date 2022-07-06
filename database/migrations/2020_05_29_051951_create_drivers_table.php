<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id('driver_id');
            $table->string('avatar')->default('default.jpg')->nullable();
            $table->string('name');
            $table->string('matric')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('faculty')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('car_name')->nullable();
            $table->string('car_number')->nullable();
            $table->string('car_type')->nullable();
            $table->string('car_colour')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
