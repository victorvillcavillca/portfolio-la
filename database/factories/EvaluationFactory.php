<?php

use Faker\Generator as Faker;

$factory->define(App\Evaluation::class, function (Faker $faker) {
	$name = $faker->sentence(5);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->sentence(15),
        'status' => true,
        'user_id' => rand(1,31),
        'specialty_id' => rand(1,10)
    ];
});
