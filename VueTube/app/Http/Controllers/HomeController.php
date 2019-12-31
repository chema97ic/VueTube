<?php

namespace Vuetube\Http\Controllers;

use Vuetube\Channel;
use Vuetube\Video;
use Vuetube\Subscription;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $query = request()->search;
        $videos = collect();
        $channels = collect();
        $queryFound = true;
        if($query) {
            
            $videos = Video::where('title', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->paginate(8, ['*'], 'video_page');
            $channels = Channel::where('name', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->paginate(5, ['*'], 'channel_page');
            if($videos->count() == 0 && $channels->count() == 0) {
                $queryFound = false;
            }
        }
        $videosFromSubscribedChannels = array();
        if(auth()->check()){
            $subscriptions = Subscription::where('user_id', '=', auth()->user()->id)->get();
            foreach ($subscriptions as $subscription) {
                $subscriptionChannel = Channel::where('id', '=', $subscription->channel_id);
                $channelVideos = Video::where('channel_id', '=', $subscriptionChannel->first()->id)->orderBy('created_at')->get()->reverse()->take(5);
                foreach ($channelVideos as $video) {
                    array_push($videosFromSubscribedChannels, $video);
                }
                //array_push($videosFromSubscribedChannels, $channelVideos);
                
            }
            usort($videosFromSubscribedChannels, function($a, $b) {
                if($a->created_at < $b->created_at) {
                    return 1;
                }
            });
        }

        $mostViewed = Video::where('id', 'LIKE', "%%")->orderBy('views')->get()->reverse()->take(8);

        return view('home')->with([
            'videos' => $videos,
            'channels' => $channels,
            'allchannels' => Channel::where('name', 'LIKE', "%%"),
            'videosFromSubscribedChannels' => $videosFromSubscribedChannels,
            'queryFound' => $queryFound,
            'mostViewed' => $mostViewed
        ]);
    }
}
