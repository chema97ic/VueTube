<?php

namespace Vuetube\Http\Controllers;

use Illuminate\Http\Request;
use Vuetube\Video;

class VoteController extends Controller
{
    public function vote(Video $video, $type) {
        return auth()->user()->toggleVote($video, $type);
    }
}
