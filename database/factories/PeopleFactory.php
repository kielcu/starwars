<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\People::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'height' => rand(50, 250),
        'mass' => rand(1, 100),
        'hair_color' => $faker->colorName,
        'skin_color' => $faker->colorName,
        'eye_color' => $faker->colorName,
        'birth_year' => collect(['47BBY', '52BBY', '19BBY'])->random(),
        'gender' => collect('male', 'female')->random()
    ];
});

$factory->afterCreating(\App\Models\People::class, function(\App\Models\People $people) {
    $people->homeworld()->create(factory(\App\Models\Planet::class)->make()->toArray());
    $people->films()->createMany(factory(\App\Models\Film::class, 3)->make()->toArray());
    $people->species()->createMany(factory(\App\Models\Species::class, 3)->make()->toArray());
    $people->starships()->createMany(factory(\App\Models\Starship::class, 3)->make()->toArray());
    $people->vehicles()->createMany(factory(\App\Models\Vehicle::class, 3)->make()->toArray());
});
