<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cloth_cat extends Model
{
    public $table = 'cloth_cat';
    public function cloth() {
        return $this->hasMany(Cloth::class , 'cl_cat_id' , 'id');
        // return $this->hasMany('App\Cloth' , 'id','cl_cat_id');
        // return $this->belongsTo('App\Cloth', 'cl_id' ,'id');
    }
}
