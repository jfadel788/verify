<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Trait\offerTrait;

class AjaxOfferController extends Controller
{
    use offerTrait;
    //
    public function create(){
        return view('AjaxOffer.CreateAjax');

    }
    public function store(Request $request){
        $file_name=$this->SaveImage($request->photo,'images/offer');
       $offer= Offer::create([
             'photo'=>$file_name,
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
        ]);

      if($offer) return response()->json([
        'status'=>true,
        'msg'=>'the offer is saved'
      ]);
      else  return response()->json([
        'status'=>false,
        'msg'=>'the offer is not saved'
      ]);
    }

   public function show(){
    $offers= Offer::select('id','name','price','details')->get();

    return view('AjaxOffer.all',compact('offers'));
   }
   public function delete(Request $request ){
    $offer= Offer::find($request->id);
    if(!$offer) return response()->json([
        'status'=>false,
        'msg'=>"the offer is not deleted"
    ]);
    $offer->delete();
    return response()->json([
        'status'=>true,
        'msg'=>"the offer has deleted",
        'id'=>$request->id
    ]);


   }

   public function edit(Request $request)
   {
    $value= Offer::find($request->offer_id);
    if(!$value){
        return redirect()->back();
    }
   $offer= Offer::select('id','name','price','details')->find($request->offer_id);
    return view('AjaxOffer.edit',compact('offer'));

   }

   public function update(Request $request){
    $offer= Offer::find($request->offer_id);
    if(!$offer){
        return response()->json([
            'status'=>false,
            'msg'=>"the offer is not found"
        ]);

    }
    $offer->update($request->all());
    return response()->json([
        'status'=>true,
        'msg'=>"the offer is  updated"
    ]);
   }
}
