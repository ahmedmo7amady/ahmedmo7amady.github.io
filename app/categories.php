<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name' , 'image'];
    public function section(){
        return $this->hasMany(section::class);
    }
}
