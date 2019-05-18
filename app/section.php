<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $table = 'sections';
    protected $fillable = [
        'categories_id' , 'name' , 'price' , 'note' , 'image'
    ];
    public function categories(){
        return $this->belongsTo(categories::class);
    }

}
