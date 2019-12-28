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
                @if(isset($channels) && $channels->count() !== 0)

                        <div class="text-center">
                            Canales
                        </div>
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

                @if(isset($videos) && $videos->count() !== 0)
                
                        <div class="text-center">
                            Videos
                        </div>
                        <hr>
                        <div class="d-flex flex-wrap justify-content-around">
                                    @foreach($videos as $video)
                                    <a href="{{route('videos.show', $video->id)}}">
                                        <div class="d-flex flex-column divwidth">
                                            <img src="{{$video->thumbnail}}" alt="">
                                            {{$video->title}}
                                        </div>
                                    </a>
                                        
                                    @endforeach
                            
                        </div>
                        <div class="row justify-content-center">
                            {{ $videos->appends(request()->query())->links() }}
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
