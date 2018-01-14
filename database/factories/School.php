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
        'photo_url' => $faker->url,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'contact_person' => $faker->name
    ];
});
