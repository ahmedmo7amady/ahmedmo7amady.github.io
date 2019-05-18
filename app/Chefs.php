<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chefs extends Model
{
    protected $table = 'chefs';
    protected $fillable = [
        'name' , 'description','depart','FBlink' , 'TWlink' , 'INlink' ,'image'
    ];
}
