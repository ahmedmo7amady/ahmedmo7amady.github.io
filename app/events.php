<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    protected $table='events';
    protected $fillable=[
        'date','time','size','name','email','phone','notes'
    ];
}
