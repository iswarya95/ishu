<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product(){
        return $this->belongsTo('App\Model\frontend\Product');
    }
}
