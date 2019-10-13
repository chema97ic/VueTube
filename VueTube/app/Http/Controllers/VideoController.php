<?php

namespace Vuetube\Http\Controllers;

use Illuminate\Http\Request;
use Vuetube\Video;

class VideoController extends Controller
{
    public function show(Video $video) {
        if(request()->wantsJson()) {
            return $video;
        }

        return view('video', compact('video'));
    }
}
