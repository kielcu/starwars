<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Starship::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'model' => $faker->realText(50),
        'manufacturer' => $faker->jobTitle,
        'cost_in_credits' => $faker->numberBetween(10, 1000000),
        'length' => $faker->numberBetween(5, 50),
        'max_atmosphering_speed' => $faker->numberBetween(500, 1000) . 'km',
        'crew' => $faker->numberBetween(1, 10),
        'passengers' => $faker->numberBetween(0, 20),
        'cargo_capacity' => $faker->numberBetween(10, 200),
        'consumables' => $faker->numberBetween(1, 10) . ' ' .collect(['week', 'day'])->random(),
        'hyperdrive_rating' => $faker->numberBetween(1, 10) + $faker->numberBetween(0, 99) / 100,
        'MGLT' => $faker->numberBetween(10, 100),
        'starship_class' => collect(['Starfighter', 'Armed government transport'])->random(),
    ];
});

$factory->afterCreating(\App\Models\Starship::class, function(\App\Models\Starship $film) {
    $film->films()->createMany(factory(\App\Models\Film::class, 3)->make()->toArray());
    $film->pilots()->createMany(factory(\App\Models\People::class, 3)->make()->toArray());
});