<?php

use Faker\Generator as Faker;

$factory->define(App\Management::class, function (Faker $faker) {
    $name = $faker->sentence(4);

    return [
		'name' => $name,
        'slug' => str_slug($name),
        'year' => rand(2015,2020),
        'description' => $faker->text(100),
        'user_id' => rand(1,30)
    ];
});
