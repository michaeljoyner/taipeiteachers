<?php

use Faker\Generator as Faker;

$factory->define(\App\Schools\School::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'telephone' => $faker->phoneNumber,
        'city' => $faker->city,
        'email' => $faker->email,
        'website' => $faker->url,
        'photo_url' => '',
        'latitude' => $faker->numberBetween(250300, 250928) / 10000,
        'longitude' => $faker->numberBetween(1214631, 1215526) / 10000,
        'contact_person' => $faker->name
    ];
});
