<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
   protected $fillable=[
   	'island_name','atoll_id','length_width','size','distance_to_male','island_usage','population','google_coordinates','neighbouring_islands','description',
   ];
 	
 	
}
