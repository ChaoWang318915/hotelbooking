<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelSessionPrice extends Model
{
    protected $table = 'hotel_session_prices';

    protected $fillable = [
        'HotelId',
        'RoomId',
        'SessionId',
        'PriceSingle',
        'PriceDoppel',
        'PriceTripple',
        'PriceRoom',
        'PriceExtraPax',
        'PriceKind1',
        'PriceKind2',
        'PriceKind3',
        'MainMeal',
        'ShowPricePerson',
        'ChildInc',
        'MealType1',
        'MealValue1',
        'MealType2',
        'MealValue2',
        'MealType3',
        'MealValue3',
        'MealType4',
        'MealValue4',
        'MinStay',
        'StornoType',
        'StornoValue'];

	public function hotel(){
    	return $this->belongsTo('App\Hotel','HotelId','id');
    }

    public function room(){
    	return $this->belongsTo('App\Room','RoomId','id');
    }

    public function hotel_session(){
    	return $this->belongsTo('App\HotelSession','SessionId','id');
    }    
}
