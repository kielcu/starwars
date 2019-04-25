<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\Species;


class SpeciesItemResponse
{
    /** @var string */
    public $name;

    /** @var string */
    public $classification;

    /** @var string */
    public $designation;

    /** @var string */
    public $average_height;

    /** @var string */
    public $skin_colors;

    /** @var string */
    public $hair_colors;

    /** @var string */
    public $eye_colors;

    /** @var string */
    public $average_lifespan;

    /** @var string */
    public $homeworld;

    /** @var string */
    public $language;

    /** @var string[] */
    public $people = [];

    /** @var string[] */
    public $films = [];

    /** @var string */
    public $created;

    /** @var string */
    public $edited;

    /** @var string */
    public $url;
}