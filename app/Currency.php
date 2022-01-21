<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
	protected $table = 'currencies';

    protected $fillable = [
        'title','symbol','base','exchange_rate','exchange_value','updated_at'
    ];


    
}
