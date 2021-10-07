<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Bunch user_id from users in comment
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
