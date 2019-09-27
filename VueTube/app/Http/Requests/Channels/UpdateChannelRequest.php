<?php

namespace Vuetube\Http\Requests\Channels;

use Illuminate\Foundation\Http\FormRequest;
use Vuetube\Http\Controllers\ChannelController;

class UpdateChannelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->channel->user_id == auth()->user()->id;  // Comprobar que el usuario es el dueño del canal

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Validaciones de actualizaciones del canal.
        return [
            'name' => 'required',
            'image' => 'image',
            'description' => 'max:1000'
        ];
    }
}
