<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    use HasFactory;

    protected $table='nhacungcap';
    protected $fillable=[
        'tenncc','email','phone','diachi','status'
    ];

    public function products(){
        return $this->hasMany('App\Models\Product','id_nhacungcap','id')->where('status','1');
    }
    
}
