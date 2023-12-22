<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard ="admin";
    protected $fillable = [
        "name",
        "email",
        "password",


    ];

    /**,
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',

    ];

}
