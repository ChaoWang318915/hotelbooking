<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{	
	protected $table = 'availabilities';

    protected $fillable=[
   		'hotel_id',
   		'room_id',
   		'day_id',
   		'availability_count'
   ];

   public function hotel()
    {
        return $this->belongsTo('App\Hotel','hotel_id','id');
    }

    public function room()
    {
        return $this->belongsTo('App\Room','room_id','id');
    }

}
