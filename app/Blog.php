<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = [
        'title' , 'description','image'
    ];

    public function comments(){
        return $this->hasMany(comment::class);
    }
}
