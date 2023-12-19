<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class AjaxOfferController extends Controller
{

    //
    public function create(){
        return view('AjaxOffer.CreateAjax');

    }
    public function store(Request $request){
        // $file_name=$this->SaveImage($request->photo,'images/offer');
        Offer::create([
            //  'photo'=>$file_name,
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
        ]);

    }
}
