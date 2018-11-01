<?php

use Faker\Generator as Faker;

$factory->define(App\Evaluation::class, function (Faker $faker) {
	$name = $faker->sentence(4);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->sentence(15),
        'status' => true,
        'time' => rand(1000,5000),
        'end_date' => now(),
        'user_id' => rand(1,30),
        'matter_id' => rand(1,50),
    ];
});
