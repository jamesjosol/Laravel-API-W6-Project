<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'user_id'   => $faker->numberBetween(1,50),
        'post_id'   => $faker->numberBetween(1,20),
        'rating'    => $faker->numberBetween(1,10),
    ];
});
