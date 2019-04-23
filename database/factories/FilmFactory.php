<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Film::class, function (Faker $faker) {
    $producer = collect([]);
    for ($i = 0; $i<5; $i++) {
        $producer->push($faker->name);
    }

    return [
        'title' => $faker->jobTitle,
        'episode_id' => $faker->numberBetween(1,5),
        'opening_crawl' => $faker->text(300),
        'director' => $faker->name,
        'producer' => $producer->random(rand(1,5))->implode(', '),
        'release_date' => $faker->date(),

    ];
});

$factory->afterCreating(\App\Models\Film::class, function(\App\Models\Film $film) {
   $film->characters()->createMany(factory(\App\Models\People::class, 3)->make()->toArray());
   $film->planets()->createMany(factory(\App\Models\Planet::class, 3)->make()->toArray());
   $film->species()->createMany(factory(\App\Models\Species::class, 3)->make()->toArray());
   $film->starships()->createMany(factory(\App\Models\Starship::class, 3)->make()->toArray());
   $film->vehicles()->createMany(factory(\App\Models\Vehicle::class, 3)->make()->toArray());
});
