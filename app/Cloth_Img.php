<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cloth_Img extends Model
{
    public $table = 'cloth_img';
    public $timestamps = false;
    protected $fillable = ['img','cl_id'];

    public function cloth() {
        $this->belongsTo(App\Cloth::class);
    }
}
