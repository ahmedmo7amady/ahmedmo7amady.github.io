<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = [
        'firstpr','secondpr','address', 'phone' , 'email'
    ];


}
