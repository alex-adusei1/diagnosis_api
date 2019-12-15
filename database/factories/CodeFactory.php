<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Code::class, function (Faker $faker) {
    return [
        'category_id' => $faker->randomDigitNotNull,
        'diagnosis_code' => $faker->randomLetter,
        'full_code' => $faker->postcode,
        'abbreviated_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'full_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
