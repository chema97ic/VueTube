@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ $channel->name }}

                <a href="{{ route('channels.upload', $channel->id) }}">Subir videos</a>
                </div>

                <div class="card-body">
                   @if($channel->editable())
                   <form id="update-channel-form" action="{{ route('channels.update', $channel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                   @endif

                        <div class="form-group row justify-content-center">
                            <div class="channel-avatar">
                                @if($channel->editable())
                                <div class="channel-avatar-overlay" onclick="document.getElementById('image').click()">
                                    <img src="https://img.icons8.com/dotty/80/000000/compact-camera.png">

                                </div>
                                @endif
                                <img src="{{$channel->image()}}" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <h4 class="text-center">
                                {{$channel->name}}
                            </h4>

                            <p class="text-center">
                                {{$channel->description}}
                            </p>

                            <div class="text-center">
                                <subscribe-button :channel="{{$channel}}" :initial-subscriptions='{{$channel->subscriptions}}' />
                            </div>

                        </div>
                        
                        @if($channel->editable())
                            <input onchange="document.getElementById('update-channel-form').submit()" style="display:none" id="image" type="file" name="image">

                            <div class="form-group">
                                <label for="name" class="form-control-label">
                                    Nombre
                                </label>
                                <input type="text" id="name" name="name" value="{{ $channel->name }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-control-label">
                                    Descripcion
                                </label>
                                <textarea name="description" id="description" cols="3" rows="3" class="form-control">{{ $channel->description }}
                                </textarea>

                                
                            </div>

                            @if($errors->any())
                                <ul class="list-group mb-5">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                            {{$error}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <button type="submit" class="btn btn-info">Actualizar ajustes</button>
                        @endif

                    @if($channel->editable())  
                   </form>
                   @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Videos
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Miniatura</th>
                            <th>Titulo</th>
                            <th>Visitas</th>
                            <th>Estado</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <td>
                                        <img width="40px" height="40px" src="{{ $video->thumbnail }}" alt="">
                                    </td>
                                    <td>
                                    @if($video->percentage !== 100)
                                        {{$video->title}}
                                    @else
                                        <a href="{{ route('videos.show', $video->id) }}">{{$video->title}}</a>
                                    @endif
                                    </td>
                                    <td>
                                        {{$video->views}}
                                    </td>
                                    <td>
                                        {{$video->percentage === 100 ? "Subido" : "Procesando..."}}
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-center">
                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
