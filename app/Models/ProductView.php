<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    use HasFactory;

    public $products=null;

    public function __construct($productview)
    {
        if($productview){
            $this->products=$productview->products;
        }
    }

    public function addProductView($product,$id){
        $productview=['productInfo'=>$product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $productview=$this->products[$id];
            }
        }
        $this->products[$id] = $productview;
    }
}
