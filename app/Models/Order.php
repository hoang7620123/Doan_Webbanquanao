<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['mahd','hoten','diachi','email','ghichu','phone','httt','ngaylap','tongtien','trangthaitt','tongtien','status'];

    public function cart_info(){
        return $this->hasMany('App\Models\Cart','order_id','id');
    }
    public static function getAllOrder($id){
        return Order::with('cart_info')->find($id);
    }
    public static function countActiveOrder(){
        $data=Order::where('trangthaitt','<>','0')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    public static function countOrderSuccess(){
        $data=Order::where('trangthaitt','4')->count();
        if($data){
            return $data;
        }
        return 0;
    }
    

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    

    public function OrderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail','id_donhang','id');
    }

}