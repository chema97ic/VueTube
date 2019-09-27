<?php

namespace Vuetube;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model as BaseModel;

// Este sera mi modelo principal del que extenderan todos los demás.

class Model extends BaseModel
{
    public $incrementing = false; //Desactivamos que el id autoincremente

    protected $guarded = [];

    protected static function boot(){
        parent::boot();

        static::creating(function ($model){
            $model->{$model->getKeyName()} = (string) Str::uuid();   //Utilizamos uuid en vez de un id incremental para mas seguridad.
        });
    }
}
