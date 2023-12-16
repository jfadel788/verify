<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table="offers";
    protected $fillable=['name','price','details','create_at','updated_at'];
    protected $hidden=['create_at','updated_at'];
    protected $timestemp=false;

}
