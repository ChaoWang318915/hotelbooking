<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitemanager extends Model
{
    protected $fillable=[
   	'name','language','domain','template','meta_title','meta_keywords','meta_description',
   ];
}
