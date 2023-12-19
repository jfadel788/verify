<?php

namespace App\Http\Controllers;
use App\Models\Video;

use Illuminate\Http\Request;
use App\Events\VedioViewer;

class VideoControoler extends Controller
{
    //
    public function Video(){
        $video=Video::first();
        event(new VedioViewer($video));
        return view("video",compact('video'));
    }
}
