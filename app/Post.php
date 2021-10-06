<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','slug','category_id','image','description','text','views'];


    //this is for show category name in post
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
