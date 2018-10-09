<?php

use Faker\Generator as Faker;

$factory->define(App\ResourceCategory::class, function (Faker $faker) {

    $name = $faker->sentence(4);

    return [
		'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(500),
        'user_id' => rand(1,30)
    ];
});
