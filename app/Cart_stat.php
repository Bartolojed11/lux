<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_stat extends Model
{
    public function cart(){
        return $this->belongsTo(App\User_cart::class);
    }
}