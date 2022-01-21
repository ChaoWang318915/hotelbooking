<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelSessionTransfer extends Model
{
    protected $table = 'hotel_session_transfers';

    public function hotel(){
    	return $this->belongsTo('App\Hotel','HotelId','id');
    }
}
