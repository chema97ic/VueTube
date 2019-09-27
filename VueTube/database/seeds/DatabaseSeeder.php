<?php

use Illuminate\Database\Seeder;
use Vuetube\Channel;
use Vuetube\User;
use Vuetube\Subscription;

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
        factory(Subscription::class, 10000)->create([
            'channel_id' => $channel1->id
        ]);

        factory(Subscription::class, 10000)->create([
            'channel_id' => $channel2->id
        ]);
    }
}
