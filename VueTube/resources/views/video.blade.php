@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$video->title}}</div>

                <div class="card-body">
                    
                    <video-js id="video" class="vjs-default-skin vjs-big-play-centered" controls preload="auto" width="640" height="268">
                        <source src='{{ asset(Storage::url("videos/{$video->id}/{$video->id}.m3u8")) }}' type="application/x-mpegURL">
                    </video-js>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://vjs.zencdn.net/7.4.1/video-js.css">
    <style>
        .vjs-default-skin {
            width: 100%;
        }
    </style>
@endsection

@section('scripts')
    <script src='https://vjs.zencdn.net/7.6.5/video.js'></script>
    <script>
        window.CURRENT_VIDEO = '{{ $video->id }}'
        var player = videojs('video');

        var viewLogged = false;

        player.on('timeupdate', function () {
            var percentagePlayed = Math.ceil(player.currentTime() / player.duration() * 100);
            if(percentagePlayed > 10 && !viewLogged) {
                axios.put("/videos/" + window.CURRENT_VIDEO);
                viewLogged = true;
            }
        });
    </script>
@endsection
