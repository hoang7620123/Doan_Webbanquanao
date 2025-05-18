<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('photo')->nullable();
            $table->integer('loaitk');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->integer('status');
            $table->rememberToken()->nullable();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'0343754517',
            'password'=>Hash::make('123456'),
            'address'=>'55A Kha Vạn Cân,Linh Đông,Thủ Đức,TP Hồ Chí Minh',
            'photo'=>'admin.jpg',
            'loaitk'=>1,
            'status'=>1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
