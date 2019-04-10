<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    public $timestamps = false;
    protected $fillable = ['convo_code', 'user_id', 'message'];
}
