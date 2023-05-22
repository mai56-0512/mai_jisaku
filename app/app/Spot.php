<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = ['prefectures','city','count'];
    // return config('spot.'.$this->spot_id);

    public function post()
    {
    return $this->belongsTo('App\Post');
    }
}