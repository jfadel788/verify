<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\OfferRequest;
use App\Trait\offerTrait;

class OfferController extends Controller
{
    use offerTrait;

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


      public function store(OfferRequest  $request)
    {
    //   $validator=  Validator::make($request->all(),[
    //         'name'=>'required|max:255|unique:offers,name',
    //         'price'=>'required|numeric',
    //         'details'=>'required',
    //     ]);
    //     if($validator->fails()){
    //         return redirect()->back()->withErrors($validator)->withInput($request->all());
    //     }

        $file_name=$this->SaveImage($request->photo,'images/offer');
        Offer::create([
             'photo'=>$file_name,
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
        ]);

     return redirect()->back()->with(['Sucess'=>'the offer is saved']);
    }
    public function getAllOffers(){
       $offers= Offer::select('id','name','price','details')->get();
       return view('offers.all',compact('offers'));
    }

    public function edit($offer_id){
    $value= Offer::find($offer_id);
    if(!$value){
        return redirect()->back();
    }
   $offer= Offer::select('id','name','price','details')->find($offer_id);
    return view('offers.edit',compact('offer'));
    return $offer_id;

    }
    public function update(OfferRequest $request,$offer_id)
     {
        $offer= Offer::find($offer_id);
        if(!$offer){
            return redirect()->back();

        }
        $offer->update($request->all());
        return redirect()->back()->with(['Sucess'=>'the offer is updated']);
     }

}
