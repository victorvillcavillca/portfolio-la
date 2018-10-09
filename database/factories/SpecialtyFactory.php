<?php

use Faker\Generator as Faker;

$factory->define(App\Specialty::class, function (Faker $faker) {
    
    $name = $faker->sentence(4);

    return [
		'user_id' 		=> rand(1,30),
        'specialty_area_id' => rand(1,20),
        'name' 			=> $name,
        'order' 		=> rand(1,20),
        'slug' 			=> str_slug($name),
        'description' 	=> $faker->text(200),
        'body' 			=> $faker->text(500),
        'file'          => $faker->imageUrl($width = 286, $height = 180),
        // 'file' 			=> $faker->imageUrl($width = 1200, $height = 400),
        'filename' 			=> 'default.jpg',
        'imagename' 			=> 'default.jpg',
        'status'        => $faker->randomElement(['DRAFT', 'PUBLISHED'])
    ];
});
