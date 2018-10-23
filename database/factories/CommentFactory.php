<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
		'comment' => $faker->sentence(7),
        'post_id' => rand(1,100),
        'user_id' => rand(1,31)
    ];
});
