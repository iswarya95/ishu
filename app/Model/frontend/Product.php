<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orders(){
        return $this->hasMany('App\Model\frontend\Order','product_id');
    }
}
