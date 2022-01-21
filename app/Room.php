<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
      protected $fillable=[
   	'hotel_id','room_name','description','room_size','occupancy_adults1','occupancy_childs1','occupancy_adults2','occupancy_childs2','room_amenities',
   ];

   public function getChilredAdults($data, $child, $baby)
    {
    	$erwachsene = $data['erwachsene'];
    	$kinder = $data['kinder'];
    	for ($i=1;$i<=4;$i++) {
    		$key = 'alter_kind_'.$i;
    		if ($data[$key] > $child) {
				$erwachsene++;
				$kinder--;
	    	}
    	}
    	return [
    		'extra' => $erwachsene - $data['erwachsene'],
    		'erwachsene' => $erwachsene,
    		'kinder' => $kinder
    	];
    }
}
