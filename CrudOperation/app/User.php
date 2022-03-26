<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Events\UserCreated;

class User extends Authenticatable
{
    use Notifiable;


    // protected $dispatchesEvents=[
    //         'created'=>UserCreated::class
    // ];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function($user){
    //         dd('From Boot Method', $user);
    //     });

    //     static::updated(function($user){
    //      dd('From Boot Method updated', $user);
    //     });

    // }

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
}
