<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'hotel_name','island','country','streetno','zip','city','phone','e-mail','fax','internet','google_coordinates','stars','number_rooms','invoice_currency','credit_cards','minimum_stay','board','accessible','wifi','minimum_text','url_key','divingbases','cpfr_baby_min','cpfr_baby_max','cpfr_teen_min','cpfr_teen_max','cpfr_child_min','cpfr_child_max','cpfr_adult_min','cpfr_adult_max',
    ];


    public function rooms()
    {
        return $this->hasMany('App\Room','hotel_id');
    }

    public function islandd()
    {
      return $this->belongsTo('App\Island', 'island','id');
    }  
}
