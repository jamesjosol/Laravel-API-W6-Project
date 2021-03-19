<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'   => $faker->numberBetween(1,50),
        'post'      => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'tags'      => $faker->word,
    ];
});
