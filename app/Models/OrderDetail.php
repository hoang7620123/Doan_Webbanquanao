<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orders_detail';
    protected $fillable = ['id_donhang', 'product_id', 'soluong', 'giaban', 'thahtien', 'trangthai'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'id_donhang');
    }
    public function product_info()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    public static function getAllOrderDeatil()
    {
        return OrderDetail::with(['product_info'])->join('orders',)->paginate(10);
    }
}
