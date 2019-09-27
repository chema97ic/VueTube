<?php
use Vuetube\Channel;
use Vuetube\User;
use Vuetube\Subscription;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Vuetube\Model;
use Faker\Generator as Faker;

$factory->define(Channel::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'user_id' => function(){
            return factory(User::class)->create()->id;
        },
        'description' => $faker->sentence(30)
    ];
});
