<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{

    public function __construct()
    {

    }

    // public function store()
    // {
    //     Offer::create([

    //         'name'=>"mack",
    //         'price'=>41,
    //         'details'=>'dsasad',
    //     ]);

    // }
    public  function create(){
        return view("offers.create");
    }


      public function store(Request $request)
    {
      $validator=  Validator::make($request->all(),[
            'name'=>'required|max:255|unique:offers,name',
            'price'=>'required|numeric',
            'details'=>'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        Offer::create([

            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
        ]);

     return redirect()->back()->with(['Sucess'=>'the offer is saved']);
    }

}
