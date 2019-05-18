<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class table extends Model
{
    protected $table='tables';
    protected $fillable = [
        'date','time','size'
    ];
}
