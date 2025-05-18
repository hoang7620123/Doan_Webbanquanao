<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products = null;
	public $totalQuantity = 0;
	public $totalPrice = 0;
    public function __construct($cart){
        if($cart){
            $this->products=$cart->products;
            $this->totalQuantity = $cart->totalQuantity;
            $this->totalPrice = $cart->totalPrice;
        }
    }
    public function AddCart($product, $id){

        $newProduct=['quantity'=>0,'price'=>$product->price,'productInfo'=>$product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newProduct=$this->products[$id];//neusp đã tồn tại trong mảng
            }
        }
       
            $newProduct['quantity']++;
            $newProduct['price']=$newProduct['quantity']*$product->price;
            $this->products[$id] = $newProduct;
            $this->totalPrice+=$product->price;
            $this->totalQuantity++;
    }
    public function SingleAddCart($product,$id,$qty){
        $gia = 0;
		if($product->discount!=0) {
			   $gia = ($product->price-($product->price*$product->discount)/100);
               //dd($gia);
		}else {
			   $gia = $product->price;
		}
		$giohang = ['quantity'=>0, 'price' => $gia, 'productInfo' => $product];


		if($this->items) {
			   if(array_key_exists($id, $this->products)){
					  $giohang = $this->products[$id];
			   }
		}

		if($qty > 1 && $giohang['quantity'] > 0) {
			$giohang['quantity'] += $qty;
			$giohang['price'] = $gia * $giohang['quantity'];

			$this->totalQuantity += $qty;
			$this->totalPrice += $giohang['price'] - $this->products[$id]['price'];

			$this->products[$id] = $giohang;
		}

		elseif($qty > 1 && $giohang['quantity'] == 0) {
		
			$giohang['quantity'] += $qty;
			$giohang['price'] = $gia * $giohang['quantity'];

			$this->totalQuantity += $qty;
			$this->totalPrice += $giohang['price'];

			$this->products[$id] = $giohang;
		}

		elseif($qty = 1 && $giohang['quantity'] > 0) {
		
			$giohang['quantity'] += $qty;
			$giohang['price'] = $gia * $giohang['quantity'];

			$this->totalQuantity += $qty;
			$this->totalPrice += ($giohang['price'] - $this->items[$id]['price']);

			$this->products[$id] = $giohang;
		}
		

		else {
			$giohang['quantity']++;
			$giohang['price'] = $gia * $giohang['quantity'];

			$this->totalQuantity++;
			$this->totalPrice += $giohang['price'];
			
			$this->products[$id] = $giohang;
		}
    }
    public function updateCart($product,$quantity, $id){
        if($quantity != $this->products[$id]['quantity']) {
			$price = 0;
			if($product->discount!=0) {
				$price = ($product->price-($product->price*$product->discount)/100);
			}else {
				$price = $product->price;
			}
			if($this->products) {
				if(array_key_exists($id, $this->products)) {
						$giohang = $this->products[$id];
				}
			}

			$giaCu = $price * $this->products[$id]['quantity'];
			$soLuongCu = $this->products[$id]['quantity'];

			$giohang['quantity']=$quantity;
			$giohang['price'] = $price * $giohang['quantity'];
			$this->products[$id] = $giohang;

			$tongSLUpdate = $this->totalQuantity + $giohang['quantity'] - $soLuongCu;
			$this->totalQuantity = $tongSLUpdate;

			$tongTienUpDate = $this->totalPrice + $giohang['price'] - $giaCu ;
			$this->totalPrice = $tongTienUpDate;
			
		}
    }

    // public function updateCart($key, $sl, $keyNew = null){
    //     if ($keyNew) {
    //         $this->totalQuanty -= $this->products[$key]['quantity'];
    //         $this->totalPrice -= $this->products[$key]['price'];

    //         $this->products[$keyNew]['quantity'] += $sl;
    //         $this->products[$keyNew]['price'] += $sl * ($this->products[$keyNew]['productInfo']->giaban + $this->products[$keyNew]['size']->price);


    //         $this->totalQuanty = $this->products[$keyNew]['quantity'];
    //         $this->totalPrice = $this->products[$keyNew]['price'];
    //         unset($this->products[$key]);
    //     } else {

    //         $this->totalQuanty -= $this->products[$key]['quantity'];
    //         $this->totalPrice -= $this->products[$key]['price'];

    //         $this->products[$key]['quantity'] = $sl;
    //         $this->products[$key]['price'] = $sl * ($this->products[$key]['productInfo']->giaban + $this->products[$key]['size']->price);
    //         $this->totalQuanty += $this->products[$key]['quantity'];
    //         $this->totalPrice += $this->products[$key]['price'];
    //     }
    // }
    public function DeleteItemCart($id){
        $this->totalQuantity -= $this->products[$id]['quantity']; //- số luong của sp có id trong dsach products
        $this->totalPrice -= $this->products[$id]['price'];//- giá của sp có id trong dsach products
        unset($this->products[$id]); 
    }

    public function checkCartProduct($id, $cart)
    {
        $i = 0;
        foreach ($cart->products as $key => $value) {
            if ($key == $id) {
                $i++;
            }
            if ($value['productInfo']->id == $id) {
                return $key;
            }
        }
        if ($i > 0) {
            return $id;
        } else {
            return $id;
        }
    }
}
