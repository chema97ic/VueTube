<?php

namespace Vuetube\Http\Controllers;

use Illuminate\Http\Request;
use Vuetube\Channel;
use Vuetube\Subscription;
use Vuetube\Jobs\Videos\ConvertForStreaming;
use Vuetube\Jobs\Videos\CreateVideoThumbnail;

class UploadVideoController extends Controller
{
    public function index(Channel $channel) {
        return view('channels.upload', [
            'channel' => $channel
        ]);
    }

    public function store(Channel $channel) {
        $video = $channel->videos()->create([
            'title' => request()->title,
            'path' => request()->video->store("channels/{$channel->id}")
        ]);
        
            $this->dispatch(new CreateVideoThumbnail($video));

        $this->dispatch(new ConvertForStreaming($video));

        return $video;
    }
}
