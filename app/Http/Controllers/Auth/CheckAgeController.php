<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckAgeController extends Controller
{
    //
    public function adult(){
        return view('checkAge');
    }

}
