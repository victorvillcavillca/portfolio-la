<?php

use Faker\Generator as Faker;

$factory->define(App\Matter::class, function (Faker $faker) {
    $name = $faker->sentence(4);

    return [
		'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(100),
        'management_id' => rand(1,30),
        'user_id' => rand(1,30)
    ];
});
