<?php

namespace Vuetube;

use Vuetube\Video;
use Vuetube\User;
use Vuetube\Vote;
use Vuetube\Channel;

class Comment extends Model
{
    protected $with = ['user', 'votes'];

    protected $appends = ['repliesCount', 'channelImage'];

    protected $fillable = ['body', "comment_id", "video_id"];

    public function video() {
        return $this->belongsTo(Video::class);
    }

    public function getRepliesCountAttribute() {
        return $this->replies->count();
    }
    public function getChannelImageAttribute() {
            try {
                return $this->user->channel->image;
            } catch (\Throwable $th) {
                return;
            }
    }

    public function votes() {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'comment_id')->whereNotNull('comment_id');
    }

    
}
