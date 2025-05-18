<?php

use Illuminate\Http\Request;

class Helper{

    public static function getCart(Request $request){
      return session()->get('cart');
    }
}

?>