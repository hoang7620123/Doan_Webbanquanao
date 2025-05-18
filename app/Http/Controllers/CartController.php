<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailOrder;
use App\Mail\MailOrderReponse;

class CartController extends Controller
{
    public function AddCart(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product->stock == '0') {
            session()->flash('error', 'Sản phẩm này đã hết hàng');
            return back();
        }

        $discount = 0;
        if ($product->discount > 0) {
            $discount = ($product->price - ($product->price * $product->discount) / 100);
        } else {
            $discount = $product->price;
        }
        $product->price = $discount;
        if ($product != null) {
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($oldCart);
            $idCart = $request->id;
            if ($oldCart) {
                $idCart = $newCart->checkCartProduct($product->id, $oldCart);
            }
            $newCart->addCart($product, $idCart, $request->sl);
            $request->session()->put('cart', $newCart);
        }
        return back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
    }

    public function SingleAddToCart(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product->stock == '0') {
            session()->flash('error', 'Sản phẩm này đã hết hàng');
            return back();
        }
        // $discount = 0;
        // if ($product->discount > 0) {
        //     $discount = ($product->price - ($product->price * $product->discount) / 100);
        // } else {
        //     $discount = $product->price;
        // }

        // $product->price = $discount;
        if ($product != null) {
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($oldCart);
            $quantity = $request->quantity;
            //dd($quantity);
            $idCart = $request->id;
            if ($oldCart) {
                $idCart = $newCart->checkCartProduct($product->id, $oldCart);
            }
            $newCart->SingleAddCart($product, $idCart, $quantity);
            $request->session()->put('cart', $newCart);
        }
        return back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
    }

    public function updateCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $quantity = $request->quantity;
        $cart->updateCart($product, $quantity, $id);
        $request->session()->put('cart', $cart);
        return back()->with('success', 'Cập nhật giỏ hàng thành công!');
    }



    public function DeleteCart(Request $request, $id)
    {
        if ($request->session()->has('cart')) {
            //
            $nowcart = $request->session()->get('cart');
        } else {
            $nowcart = null;
        }
        $newcart = new Cart($nowcart);
        $newcart->DeleteItemCart($id);
        if (count($newcart->products) > 0) {
            $request->session()->put('cart', $newcart); //nếu còn sp trong giả hàng put lại
        } else {
            $request->session()->forget('cart'); // nếu k còn sản phẩm xóa luôn giỏ hàng
        }
        return back()->with('error', 'Xóa sản phẩm thành công!');
    }

    public function postCheckout(Request $request)
    {
        $cart = Session('cart') ? Session('cart') : null;
        $donhang = new Order();
        $aray = ['DO', 'OD', 'DR', 'RD'];
        $madh = Arr::random($aray) . rand(10000, 99999);
        $donhang['mahd'] = $madh;
        $donhang['email'] = $request->email;
        $donhang['hoten'] = $request->hoten;
        $donhang['phone'] = $request->phone;
        $donhang['diachi'] = $request->address_detail . ', ' . $request->ward . ', ' . $request->district . ', ' . $request->city;
        $donhang['ghichu'] = $request->ghichu;
        $donhang['tongtien'] = $cart->totalPrice;
        $donhang['ngaylap'] = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang['httt'] = $request->payment;
        $donhang['trangthaitt'] = '1';
        $donhang['status'] = '1';
        $donhang->save();
        Mail::to('kq909981@gmail.com')->send(new MailOrder($donhang));
        Mail::to($request->email)->send(new MailOrderReponse($donhang));
        foreach ($cart->products as $key => $value) {

            // update số lượng khi đặt hàng
            $updateSL = Product::find($key);
            $updateSL->stock -= $value['quantity'];
            $updateSL->save();

            $data = new OrderDetail();
            $data['id_donhang'] = $donhang->id;
            $data['product_id'] = $value['productInfo']->id;
            $data['soluong'] = $value['quantity'];
            $data['giaban'] = $value['productInfo']->price;
            $data['thanhtien'] = $value['price'];
            $data['trangthai'] = '1';
            $data->save();
            $request->session()->forget('cart');
        }
        return redirect()->route('home')->with('success', 'Đặt Hàng Thành Công!');
        // return back();
    }
}
