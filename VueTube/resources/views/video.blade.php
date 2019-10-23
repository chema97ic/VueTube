@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($video->editable())
            <form action="{{ route('videos.update', $video->id) }}" method="POST">
                    @csrf

                    @method('PUT')
                @endif
                    <div class="card-header">{{$video->title}}</div>
                
                <div class="card-body">
                    
                    <video-js id="video" class="vjs-default-skin vjs-big-play-centered" controls preload="auto" width="640" height="268">
                        <source src='{{ asset(Storage::url("videos/{$video->id}/{$video->id}.m3u8")) }}' type="application/x-mpegURL">
                    </video-js>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mt-3">
                                @if($video->editable())
                                    <input type="text" spellcheck="false" style="border: none; width:500px; outline:none" value="{{ $video->title }}" name="title">
                                @else
                                    {{ $video->title }}
                                @endif
                            </h4>
                            {{ $video->views }} views
                        </div>

                    <votes :default_votes='{{ $video->votes}}' entity_owner="{{ $video->channel->user_id }}"></votes>
                    </div>
                    <hr>

                    <div>
                        @if($video->editable())
                            <textarea name="description" cols="3" rows="3" style="resize: none; outline:none" class="form-control">{{ $video->description }}</textarea>

                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-info btn-sm">Actualizar detalles del video.</button>
                            </div>

                            
                        @else
                            {{ $video->description }}
                        @endif
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <div class="media">
                            <img class="rounded-circle" src="https://picsum.photos/id/42/200/200" width="50" height="50" class="mr-3" alt="...">
                            <div class="media-body ml-2">
                                <h5 class="mt-0 mb-0">
                                    <a href="{{ route('channels.show', $video->channel->id) }}">{{ $video->channel->name }}</a>
                                </h5>
                                <span class="small">Published on {{ $video->created_at->toFormattedDateString() }}</span>
                            </div>
                        </div>

                        <subscribe-button :channel="{{$video->channel}}" :initial-subscriptions='{{$video->channel->subscriptions}}' />
                    </div>
                </div>
                @if($video->editable())
                </form>
                @endif
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
        .thumbs-up, .thumbs-down {
            width: 20px;
            height: 20px;
            cursor: pointer;
            fill: currentColor;
        }
        .thumbs-down-active, .thumbs-up-active {
            color: #3EA6FF;
        }
        .thumbs-down {
            margin-left: 1rem;
        }
    </style>
@endsection

@section('scripts')
    <script src='https://vjs.zencdn.net/7.6.5/video.js'></script>
    <script>
        window.CURRENT_VIDEO = '{{ $video->id }}';
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
