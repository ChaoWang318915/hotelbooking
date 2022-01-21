<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atoll extends Model
{
     protected $fillable = [
        'atoll_name','atoll_name_dhivehi','length_width','number_islands_atoll','distance_to_male','resident','number_resorts_in_atoll','google_coordinates','inhabited_islands','description',
    ];

    public function atoll_images()
    {
        return $this->hasMany('App\Atoll_image');
    }
}
