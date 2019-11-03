<?php

namespace Vuetube\Http\Controllers;

use Illuminate\Http\Request;
use Vuetube\Video;
use Vuetube\Comment;

class CommentController extends Controller
{
    public function index(Video $video) {
        return $video->comments()->paginate(5);
    }

    public function show(Comment $comment) {
        return $comment->replies()->paginate(10);
    }
}
