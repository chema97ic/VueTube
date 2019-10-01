@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
    <div class="row justify-content-center">
    <channel-uploads :channel="{{ $channel }}" inline-template>
        <div class="col-md-8">
            
            <div class="card p-3 d-flex justify-content-center align-items-center" v-if="!selected">
                    <img onclick="document.getElementById('video-files').click()" width="70px" height="70px" src="https://img.icons8.com/ultraviolet/40/000000/upload.png">
                    <input type="file" multiple id="video-files" style="display: none" ref="videos" @change="upload">
                    <p class="text-center">¡Clicka en el icono para subir tus videos!</p>
            </div>

            <div class="card p-3" v-else>
                <div class="my-4" v-for="video in videos">
                    <div class="progress mb-3">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :style="{ width: `${progress[video.name]}%` }" aria-volumemin="0" aria-volume="100"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex justify-content-center align-items-center" style="height: 180px; color: white; font-size: 18px; background: #808080;">
                                Cargando miniatura...
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="text-center">
                                @{{video.name}}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </channel-uploads>
    </div>
</div>
@endsection
