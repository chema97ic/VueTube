<?php

use Illuminate\Database\Seeder;
use Vuetube\Channel;
use Vuetube\User;
use Vuetube\Subscription;
use Vuetube\Video;
use Vuetube\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = factory(User::class)->create([
            'email' => 'chema@chema.com'
        ]);

        $user2 = factory(User::class)->create([
            'email' => 'juan@perez.com'
        ]);

        $channel1 = factory(Channel::class)->create([
            'user_id' => $user1->id
        ]);

        $channel2 = factory(Channel::class)->create([
            'user_id' => $user2->id
        ]);
        
        //Hacemos que los usuarios se subscriban entre si.
        $channel1->subscriptions()->create([
            'user_id'=>$user2->id
        ]);

        $channel2->subscriptions()->create([
            'user_id'=>$user1->id
        ]);
        

        // Añadimos 10000 subscripciones a los canales.
        factory(Subscription::class, 100)->create([
            'channel_id' => $channel1->id
        ]);

        factory(Subscription::class, 100)->create([
            'channel_id' => $channel2->id
        ]);

        $video = factory(Video::class)->create([
            'channel_id' => $channel1->id
        ]);

        factory(Comment::class, 50)->create([
            'video_id' => $video->id
        ]);

        $comment = Comment::first();

        factory(Comment::class, 50)->create([
            'video_id' => $video->id,
            'comment_id' => $comment->id
        ]);
    }
}
