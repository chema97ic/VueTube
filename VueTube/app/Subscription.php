<?php

namespace Vuetube;

use Vuetube\Channel;
use Vuetube\Video;
use Vuetube\Subscription;
use Vuetube\User;

class Subscription extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function channel(){
        return $this->hasOne(Channel::class);
    }
}
