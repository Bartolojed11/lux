<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cloth_avlbty extends Model
{
    public $table = 'cloth_avlbty';
    public $timestamps = false;
    protected $fillable = ['cl_id','av_size','qty'];
}
