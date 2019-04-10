<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    public $table = 'cloth';
    public function cloth_cat() {
        return $this->belongsTo('App\Cloth_cat', 'cl_cat_id', 'id');
    }
    public function cloth_img() {
        return $this->hasMany('App\Cloth_Img','cl_id');
    }
}