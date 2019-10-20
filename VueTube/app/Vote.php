<?php

namespace Vuetube;


class Vote extends Model
{
    public function voteable() {
        return $this->morphTo();
    }
}
