<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'name', 'email' , 'body' , 'blog_id'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
