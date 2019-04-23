<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Planet::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'rotation_period' => $faker->numberBetween(1, 50),
        'orbital_period' => $faker->numberBetween(1, 900),
        'diameter' => $faker->numberBetween(1, 99999),
        'climate' => $faker->text(10),
        'gravity' => $faker->numberBetween(0, 100) / 100 . " standard",
        'terrain' => $faker->text(10),
        'surface_water' => $faker->numberBetween(0,1),
        'population' => $faker->numberBetween(1000, 1000000)
    ];
});

$factory->afterCreating(\App\Models\Planet::class, function(\App\Models\Planet $film) {
    $film->residents()->createMany(factory(\App\Models\People::class, 3)->make()->toArray());
    $film->films()->createMany(factory(\App\Models\Film::class, 3)->make()->toArray());
});
