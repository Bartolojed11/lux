<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_cart extends Model
{
    public function cart_stat(){
        return $this->hasOne(App/Cart_stat::class);
    }
}
