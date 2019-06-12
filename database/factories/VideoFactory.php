<?php

use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
	$name = $faker->sentence(4);

    return [
		'user_id' 		=> rand(1,30),
        'video_category_id' => rand(1,30),
        'name' 			=> $name,
        'slug' 			=> str_slug($name),
        'order' 		=> rand(1,20),
        'description' 	=> $faker->text(200),
        'body' 			=> $faker->text(500),
        'file' 			=> $faker->imageUrl($width = 1200, $height = 400),
        'url' 			=> 'https://www.youtube.com/watch?v=Zm_gpTYQ5hU&t=7s',
        'embed_code'    => '<iframe width="875" height="492" src="https://www.youtube.com/embed/4Kvd-uquuhI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        'status'        => $faker->randomElement(['DRAFT', 'PUBLISHED'])
    ];
});
