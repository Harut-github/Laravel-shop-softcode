<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','slug','price','text','image'];

    // Bunch product + Wishlist
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
}
