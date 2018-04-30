<?php

use Faker\Generator as Faker;

$factory->define(\App\Faqs\Faq::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence,
        'short_answer' => $faker->paragraph,
        'full_answer' => $faker->paragraphs(3, true)
    ];
});
