<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\Starships;


class StarshipsItemResponse
{
    /** @var string */
    public $name;

    /** @var string */
    public $model;

    /** @var string */
    public $manufacturer;

    /** @var string */
    public $cost_in_credits;

    /** @var string */
    public $length;

    /** @var string */
    public $max_atmosphering_speed;

    /** @var string */
    public $crew;

    /** @var string */
    public $passengers;

    /** @var string */
    public $cargo_capacity;

    /** @var string */
    public $consumables;

    /** @var string */
    public $hyperdrive_rating;

    /** @var string */
    public $MGLT;

    /** @var string */
    public $starship_class;

    /** @var string[] */
    public $pilots = [];

    /** @var string[] */
    public $films = [];

    /** @var string */
    public $created;

    /** @var string */
    public $edited;

    /** @var string */
    public $url;
}