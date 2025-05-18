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
            $table->string('mahd', 100);
            $table->string('hoten');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('diachi');
            $table->date('ngaylap');
            $table->integer('httt');
            $table->string('trangthaitt');
            $table->decimal('tongtien');
            $table->integer('status');
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
