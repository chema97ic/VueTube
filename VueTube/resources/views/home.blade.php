@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="">
                        <input type="text" name="search" class="form-control" placeholder="Buscar vídeos y canales">
                    </form>
                </div>
                @if($queryFound == false)
                    <div class="text-center" style="margin-bottom: 30px"> No se han encontrado resultados para esa busqueda.</div>
                    <hr>
                @endif
                @if(auth()->check() && $videos->count() == 0 && $channels->count() == 0)
                <div class="text-center" style="font-size: 30px; margin-bottom: 20px">Ultimos vídeos basados en tus suscripciones!</div>
                <div class="d-flex flex-wrap">
                        @foreach($videosFromSubscribedChannels as $video)
                            <a href="{{route('videos.show', $video->id)}}">
                                <div class="d-flex flex-column divwidth mr-4 mb-5">
                                    <img src="{{$video->thumbnail}}" alt="">
                                    {{$video->title}}
                                <small>{{$video->views}} visitas | {{$video->channel->name}}</small>
                                </div>
                            </a>
                        @endforeach
                </div>
                @endif

                @if($videos->count() == 0 && $channels->count() == 0)
                <div class="text-center" style="font-size: 30px; margin-bottom: 20px">Los vídeos mas vistos y populares!</div>
                <div class="d-flex flex-wrap">
                        @foreach($mostViewed as $video)
                            <a href="{{route('videos.show', $video->id)}}">
                                <div class="d-flex flex-column divwidth mr-4 mb-5">
                                    <img src="{{$video->thumbnail}}" alt="">
                                    {{$video->title}}
                                <small>{{$video->views}} visitas | {{$video->channel->name}}</small>
                                </div>
                            </a>
                        @endforeach
                </div>
                @endif

                @if(isset($videos) && $videos->count() !== 0)
                        <hr>
                        <div class="d-flex flex-wrap">
                                    @foreach($videos as $video)
                                    <a href="{{route('videos.show', $video->id)}}">
                                        <div class="d-flex flex-column divwidth mr-4 mb-5">
                                            <img src="{{$video->thumbnail}}" alt="">
                                            {{$video->title}}
                                        <small>{{$video->views}} visitas | {{$allchannels->where('id', 'LIKE', "%{$video->channel_id}%")->first()->name}}</small>
                                        </div>
                                    </a>
                                        
                                    @endforeach
                            
                        </div>
                        <div class="row justify-content-center">
                            {{ $videos->appends(request()->query())->links() }}
                        </div>
                    
                @endif
                @if(isset($channels) && $channels->count() !== 0)
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    @foreach($channels as $channel)
                                        <tr>
                                            <td>
                                                {{$channel->name}}
                                            </td>
                                            <td>
                                            <a href="{{route('channels.show', $channel->id)}}" class="btn btn-sm btn-info">Visitar canal</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="row justify-content-center">
                                {{$channels->appends(request()->query())->links()}}
                            </div>
                        </div>

                @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body,
	html {
		margin: 0;
		padding: 0;
		height: 100%;
		
    }
    div>img {
        width: 250px;
        height: 190px;
    }
    a {
        color: black;
        text-decoration: none;
        font-size: 20px;
    }

    .divwidth {
        max-width: 250px;
        word-wrap: break-word;
    }
</style>
@endsection
