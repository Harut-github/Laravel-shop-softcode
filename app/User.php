<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages(){
        return $this->hasMany(Message::class);
    }
    //for middlwere roles
    // public function admin()
    // {
    //     return $this->status === 1;
    // }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user;
    }
    public function edit($fields)
    {
        $this->fill($fields);
        $this->password = bcrypt($fields['password']);
        $this->save();
    }
    public function remove()
    {
        $this->delete();
    }
    public function makeAdmin()
    {
        $this->status = 1;
        $this->save();
    }
    public function makeNormal()
    {
        $this->status = 0;
        $this->save();
    }
    public function toggleAdmin($value)
    {
        if($value == null)
        {
            return $this->makeNormal();
        }
        return $this->makeAdmin();
    }
}
