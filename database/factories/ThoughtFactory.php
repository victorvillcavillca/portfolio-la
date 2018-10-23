<?php

use Faker\Generator as Faker;

$factory->define(App\Thought::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence(5),
        'user_id'	=> rand(1,31)
    ];
});
