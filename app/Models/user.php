<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    public $table  = 'users';

    use Notifiable;

    protected $guarded = array();


    protected $hidden = [
        'password', 'remember_token',
    ];



}