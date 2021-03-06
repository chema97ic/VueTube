<?php

namespace Vuetube\Http\Controllers;

use Illuminate\Http\Request;
use Vuetube\Video;
use Vuetube\Http\Requests\Videos\UpdateVideoRequest;

class VideoController extends Controller
{
    public function show(Video $video) {
        if(request()->wantsJson()) {
            return $video;
        }

        return view('video', compact('video'));
    }

    public function updateViews(Video $video) {
        $video->increment('views');

        return response()->json([]);
    }

    public function update(UpdateVideoRequest $request, Video $video) {
        $video->update($request->only(['title', 'description']));
        
        return redirect()->back();
    }

    public function delete(Video $video) {
        $affectedRows = Video::where('id', '=', $video->id)->delete();
        
        return redirect()->back();
    }
}
