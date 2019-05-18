<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $table='message';
    protected $fillable=[
        'Fname','Lname','email','subject','content'
    ];
}
