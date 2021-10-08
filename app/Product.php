<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','slug','price','text','image'];

    //Bunch user_id from users in praducts
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
