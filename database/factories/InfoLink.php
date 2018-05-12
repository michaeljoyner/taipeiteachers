<?php

use Faker\Generator as Faker;

$factory->define(\App\InfoLinks\InfoLink::class, function (Faker $faker) {
    return [
        'title'     => $faker->sentence,
        'content'   => $faker->paragraph,
        'link'      => $faker->url,
        'link_text' => $faker->words(3, true),
        'topic'     => $faker->randomElement(['teaching', 'recreation', 'living'])
    ];
});
