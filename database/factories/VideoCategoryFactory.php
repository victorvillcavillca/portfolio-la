<?php

use Faker\Generator as Faker;

$factory->define(App\VideoCategory::class, function (Faker $faker) {
    $name = $faker->sentence(3);

    return [
		'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(100),
        'user_id' => rand(1,30)
    ];
});
