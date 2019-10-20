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
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mt-3">
                                {{ $video->title }}
                            </h4>
                            {{ $video->views }} views
                        </div>

                        <div>
                                <svg class="thumbs-up" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 478.2 478.2" style="enable-background:new 0 0 478.2 478.2;" xml:space="preserve">
                                    <g>
                                        <path d="M457.575,325.1c9.8-12.5,14.5-25.9,13.9-39.7c-0.6-15.2-7.4-27.1-13-34.4c6.5-16.2,9-41.7-12.7-61.5
                                            c-15.9-14.5-42.9-21-80.3-19.2c-26.3,1.2-48.3,6.1-49.2,6.3h-0.1c-5,0.9-10.3,2-15.7,3.2c-0.4-6.4,0.7-22.3,12.5-58.1
                                            c14-42.6,13.2-75.2-2.6-97c-16.6-22.9-43.1-24.7-50.9-24.7c-7.5,0-14.4,3.1-19.3,8.8c-11.1,12.9-9.8,36.7-8.4,47.7
                                            c-13.2,35.4-50.2,122.2-81.5,146.3c-0.6,0.4-1.1,0.9-1.6,1.4c-9.2,9.7-15.4,20.2-19.6,29.4c-5.9-3.2-12.6-5-19.8-5h-61
                                            c-23,0-41.6,18.7-41.6,41.6v162.5c0,23,18.7,41.6,41.6,41.6h61c8.9,0,17.2-2.8,24-7.6l23.5,2.8c3.6,0.5,67.6,8.6,133.3,7.3
                                            c11.9,0.9,23.1,1.4,33.5,1.4c17.9,0,33.5-1.4,46.5-4.2c30.6-6.5,51.5-19.5,62.1-38.6c8.1-14.6,8.1-29.1,6.8-38.3
                                            c19.9-18,23.4-37.9,22.7-51.9C461.275,337.1,459.475,330.2,457.575,325.1z M48.275,447.3c-8.1,0-14.6-6.6-14.6-14.6V270.1
                                            c0-8.1,6.6-14.6,14.6-14.6h61c8.1,0,14.6,6.6,14.6,14.6v162.5c0,8.1-6.6,14.6-14.6,14.6h-61V447.3z M431.975,313.4
                                            c-4.2,4.4-5,11.1-1.8,16.3c0,0.1,4.1,7.1,4.6,16.7c0.7,13.1-5.6,24.7-18.8,34.6c-4.7,3.6-6.6,9.8-4.6,15.4c0,0.1,4.3,13.3-2.7,25.8
                                            c-6.7,12-21.6,20.6-44.2,25.4c-18.1,3.9-42.7,4.6-72.9,2.2c-0.4,0-0.9,0-1.4,0c-64.3,1.4-129.3-7-130-7.1h-0.1l-10.1-1.2
                                            c0.6-2.8,0.9-5.8,0.9-8.8V270.1c0-4.3-0.7-8.5-1.9-12.4c1.8-6.7,6.8-21.6,18.6-34.3c44.9-35.6,88.8-155.7,90.7-160.9
                                            c0.8-2.1,1-4.4,0.6-6.7c-1.7-11.2-1.1-24.9,1.3-29c5.3,0.1,19.6,1.6,28.2,13.5c10.2,14.1,9.8,39.3-1.2,72.7
                                            c-16.8,50.9-18.2,77.7-4.9,89.5c6.6,5.9,15.4,6.2,21.8,3.9c6.1-1.4,11.9-2.6,17.4-3.5c0.4-0.1,0.9-0.2,1.3-0.3
                                            c30.7-6.7,85.7-10.8,104.8,6.6c16.2,14.8,4.7,34.4,3.4,36.5c-3.7,5.6-2.6,12.9,2.4,17.4c0.1,0.1,10.6,10,11.1,23.3
                                            C444.875,295.3,440.675,304.4,431.975,313.4z"/>
                                    </g>
                                    </svg>

                                    23k
                                    <svg class="thumbs-down" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            width="475.092px" height="475.092px" viewBox="0 0 475.092 475.092" style="enable-background:new 0 0 475.092 475.092;"
                                            xml:space="preserve">
                                        <g>
                                            <path d="M442.822,209.562c1.715-6.283,2.57-12.847,2.57-19.702c0-14.655-3.621-28.361-10.852-41.112
                                                c0.567-3.995,0.855-8.088,0.855-12.275c0-19.223-5.716-36.162-17.132-50.819v-1.427c0.191-26.075-7.946-46.632-24.414-61.669
                                                C377.387,7.521,355.831,0,329.186,0h-31.977c-19.985,0-39.02,2.093-57.102,6.28c-18.086,4.189-39.304,10.468-63.666,18.842
                                                c-22.08,7.616-35.211,11.422-39.399,11.422H54.821c-10.088,0-18.702,3.567-25.84,10.704C21.845,54.387,18.276,63,18.276,73.085
                                                v182.728c0,10.089,3.566,18.698,10.705,25.837c7.142,7.139,15.752,10.705,25.84,10.705h78.228
                                                c6.849,4.572,19.889,19.324,39.113,44.255c11.231,14.661,21.416,26.741,30.551,36.265c3.612,3.997,6.564,10.089,8.848,18.271
                                                c2.284,8.186,3.949,16.228,4.998,24.126c1.047,7.898,3.475,16.516,7.281,25.837c3.806,9.329,8.944,17.139,15.415,23.422
                                                c7.423,7.043,15.985,10.561,25.697,10.561c15.988,0,30.361-3.087,43.112-9.274c12.754-6.184,22.463-15.845,29.126-28.981
                                                c6.663-12.943,9.996-30.646,9.996-53.103c0-17.702-4.568-35.974-13.702-54.819h50.244c19.801,0,36.925-7.23,51.394-21.7
                                                c14.469-14.462,21.693-31.497,21.693-51.103C456.809,239.165,452.15,223.652,442.822,209.562z M85.942,104.219
                                                c-3.616,3.615-7.898,5.424-12.847,5.424c-4.95,0-9.233-1.805-12.85-5.424c-3.615-3.621-5.424-7.898-5.424-12.851
                                                c0-4.948,1.809-9.231,5.424-12.847c3.621-3.617,7.9-5.424,12.85-5.424c4.949,0,9.231,1.807,12.847,5.424
                                                c3.617,3.616,5.426,7.898,5.426,12.847C91.368,96.317,89.56,100.598,85.942,104.219z M409.135,281.377
                                                c-7.42,7.33-15.886,10.992-25.413,10.992H283.227c0,11.04,4.564,26.217,13.698,45.535c9.138,19.321,13.71,34.598,13.71,45.829
                                                c0,18.647-3.046,32.449-9.134,41.395c-6.092,8.949-18.274,13.422-36.546,13.422c-4.951-4.948-8.572-13.045-10.854-24.276
                                                c-2.276-11.225-5.185-23.168-8.706-35.83c-3.519-12.655-9.18-23.079-16.984-31.266c-4.184-4.373-11.516-13.038-21.982-25.98
                                                c-0.761-0.951-2.952-3.806-6.567-8.562c-3.614-4.757-6.613-8.658-8.992-11.703c-2.38-3.046-5.664-7.091-9.851-12.136
                                                c-4.189-5.044-7.995-9.232-11.422-12.565c-3.427-3.327-7.089-6.708-10.992-10.137c-3.901-3.426-7.71-5.996-11.421-7.707
                                                c-3.711-1.711-7.089-2.566-10.135-2.566h-9.136V73.092h9.136c2.474,0,5.47-0.282,8.993-0.854c3.518-0.571,6.658-1.192,9.419-1.858
                                                c2.76-0.666,6.377-1.713,10.849-3.14c4.476-1.425,7.804-2.522,9.994-3.283c2.19-0.763,5.568-1.951,10.138-3.571
                                                c4.57-1.615,7.33-2.613,8.28-2.996c40.159-13.894,72.708-20.839,97.648-20.839h36.542c16.563,0,29.506,3.899,38.828,11.704
                                                c9.328,7.804,13.989,19.795,13.989,35.975c0,4.949-0.479,10.279-1.423,15.987c5.708,3.046,10.231,8.042,13.559,14.987
                                                c3.333,6.945,4.996,13.944,4.996,20.985c0,7.039-1.711,13.61-5.141,19.701c10.089,9.517,15.126,20.839,15.126,33.974
                                                c0,4.759-0.948,10.039-2.847,15.846c-1.899,5.808-4.285,10.327-7.139,13.562c6.091,0.192,11.184,4.665,15.276,13.422
                                                c4.093,8.754,6.14,16.468,6.14,23.127C420.277,265.525,416.561,274.043,409.135,281.377z"/>
                                        </g>
                                </svg>

                                11k
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <div class="media">
                            <img class="rounded-circle" src="https://picsum.photos/id/42/200/200" width="50" height="50" class="mr-3" alt="...">
                            <div class="media-body ml-2">
                                <h5 class="mt-0 mb-0">
                                    {{ $video->channel->name }}
                                </h5>
                                <span class="small">Published on {{ $video->created_at->toFormattedDateString() }}</span>
                            </div>
                        </div>

                        <subscribe-button :channel="{{$video->channel}}" :initial-subscriptions='{{$video->channel->subscriptions}}' />
                    </div>
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
