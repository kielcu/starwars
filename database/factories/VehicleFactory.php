<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Vehicle::class, function (Faker $faker) {
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
        'vehicle_class' => collect(['repulsorcraft', 'sail barge'])->random()
    ];
});

$factory->afterCreating(\App\Models\Vehicle::class, function(\App\Models\Vehicle $film) {
    $film->films()->createMany(factory(\App\Models\Film::class, 3)->make()->toArray());
    $film->pilots()->createMany(factory(\App\Models\People::class, 3)->make()->toArray());
});
