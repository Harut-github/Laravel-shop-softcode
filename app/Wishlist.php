<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{	
	// protected $fillable = ['user_id','product_id','product_title','product_slug','product_price','product_text'];

		
    //Bunch user_id from users in wishlist
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
