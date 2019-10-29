<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Vuetube\Comment;
use Vuetube\Video;
use Vuetube\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence(6),
        'user_id' => function(){
            return factory(User::class)->create()->id;
        },

        'video_id' => function(){
            return factory(Video::class)->create()->id;
        },
        'comment_id' => null
    ];
});
