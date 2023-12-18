<?php

namespace App\Trait;



Trait offerTrait
{


    public function SaveImage($Photo,$path){
        $fileextension= $Photo->getClientOriginalExtension();
        $file_name= time().'.'.$fileextension;
        $path=$path;
        $Photo->move($path,$file_name);
        return $file_name;
    }


}
