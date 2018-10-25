<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
	$answer = $faker->sentence(2);
    return [
        'question' => $faker->sentence(5),
        'option_1' => $faker->sentence(2),
        'option_2' => $faker->sentence(2),
        'option_3' => $answer,
        'option_4' => $faker->sentence(2),
        'answer' => $answer,
        'user_id' 	  => rand(1,30),
        'evaluation_id' => rand(1,100)
    ];
});
