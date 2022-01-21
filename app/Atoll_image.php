<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atoll_image extends Model
{
	 protected $fillable = [
        'image_name','atoll_id',
    ];
    public function atolls()
{
    return $this->belongsTo('App\Atoll');
}
}
