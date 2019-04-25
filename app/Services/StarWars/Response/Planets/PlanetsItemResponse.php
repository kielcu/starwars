<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\Planets;


class PlanetsItemResponse
{
    /** @var string */
    public $name;

    /** @var string */
    public $rotation_period;

    /** @var string */
    public $orbital_period;

    /** @var string */
    public $diameter;

    /** @var string */
    public $climate;

    /** @var string */
    public $gravity;

    /** @var string */
    public $terrain;

    /** @var string */
    public $surface_water;

    /** @var string */
    public $population;

    /** @var string[] */
    public $residents = [];

    /** @var string[] */
    public $films = [];

    /** @var string */
    public $created;

    /** @var string */
    public $edited;

    /** @var string */
    public $url;
}