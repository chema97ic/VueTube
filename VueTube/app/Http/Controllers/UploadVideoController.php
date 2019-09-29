<?php

namespace Vuetube\Http\Controllers;

use Illuminate\Http\Request;
use Vuetube\Channel;
use Vuetube\Subscription;

class UploadVideoController extends Controller
{
    public function index(Channel $channel) {
        return view('channels.upload', [
            'channel' => $channel
        ]);
    }
}
