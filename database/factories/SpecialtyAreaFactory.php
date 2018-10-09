<?php

use Faker\Generator as Faker;

$factory->define(App\SpecialtyArea::class, function (Faker $faker) {

    $name = $faker->sentence(4);

    return [
		'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(500),
    ];
});
