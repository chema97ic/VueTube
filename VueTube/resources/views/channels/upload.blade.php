@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <channel-uploads inline-template>
        <div class="col-md-8">
            
            <div class="card p-3 d-flex justify-content-center align-items-center" v-if="!selected">
                    <img onclick="document.getElementById('video-files').click()" width="70px" height="70px" src="https://img.icons8.com/ultraviolet/40/000000/upload.png">
                    <input type="file" id="video-files" style="display: none" ref="videos" @change="upload">
                    <p class="text-center">¡Clicka en el icono para subir tus videos!</p>
            </div>

            <div class="card p-3" v-else>

            </div>
        </div>
        </channel-uploads>
    </div>
</div>
@endsection
