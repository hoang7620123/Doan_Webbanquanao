<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DonHangController extends Controller
{
    public function order()
    {
        $orders=Order::orderBy('id','DESC')->paginate(10);
        $order_details=OrderDetail::all();
        return view('backend.order.index')->with('orders',$orders)
        ->with('order_details',$order_details);
    }

    // Hiển thị doanh thu lên biểu đồ
    public function incomchat(Request $request)
    {
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Order::whereYear('ngaylap',$year)->where('trangthaitt','4')->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->sum('tongtien');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }
}
