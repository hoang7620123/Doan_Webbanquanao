<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->text('short_des');
            $table->string('logo');
            $table->string('photo');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();
        });
        DB::table('settings')->insert([
            'description'=>'Phá bỏ suy nghĩ thời trang thiết kế là phải "đắt đỏ", Gillee mang tới những sản phẩm thời trang trẻ trung, cá tính, với giá thành phải chăng cùng chất lượng “vượt ngoài mong đợi”',
            'short_des'=>'aaa',
            'logo'=>'null',
            'photo'=>'null',
            'address'=>'Số 16, đường Lý Chính Thắng, phường 8, quận 3, Tp. Hồ Chí Minh',
            'phone'=>'0343754517',
            'email'=>'kq909981@gmail.com',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
