<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelSessionSp extends Model
{
    protected $table = 'hotel_session_sps';

    public function hotel(){
    	return $this->belongsTo('App\Hotel','HotelId','id');
    }

    
}
