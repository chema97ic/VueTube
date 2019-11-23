@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Página principal</div>

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
                @if($channels->count() !== 0)
                <div class="card">
                        <div class="card-header">
                            Canales
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>

                                    </th>
                                </thead>
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
                    </div>
                @endif

                @if($videos->count() !== 0)
                <div class="card">
                        <div class="card-header">
                            Videos
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>

                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($videos as $video)
                                        <tr>
                                            <td>
                                                {{$video->title}}
                                            </td>
                                            <td>
                                            <a href="{{route('videos.show', $video->id)}}" class="btn btn-sm btn-info">Visitar video</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row justify-content-center">
                                    {{ $videos->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
