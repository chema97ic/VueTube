<?php

namespace Vuetube;

use Vuetube\Video;
use Vuetube\User;

class Comment extends Model
{
    public function video() {
        return $this->belongstTo(Video::class);
    }

    public function user() {
        return $this->belongstTo(User::class);
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'comment_id')->whereNotNull('comment_id');
    }
}
