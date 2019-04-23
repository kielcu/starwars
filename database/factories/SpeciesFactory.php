<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Species::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'classification' => collect(['gastropod', 'mammal'])->random(),
        'designation' => collect(['sentient'])->random(),
        'average_height' => $faker->numberBetween(10, 200),
        'skin_colors' => $faker->colorName,
        'hair_colors' => $faker->colorName,
        'eye_colors' => $faker->colorName,
        'average_lifespan' => $faker->numberBetween(10, 100),
        'language' => collect(['Toydarian', 'Dugese'])->random(),
    ];
});

$factory->afterCreating(\App\Models\Species::class, function(\App\Models\Species $film) {
    $film->homeworld()->create(factory(\App\Models\Planet::class)->make()->toArray());
    $film->films()->createMany(factory(\App\Models\Film::class, 3)->make()->toArray());
    $film->people()->createMany(factory(\App\Models\People::class, 3)->make()->toArray());
});
