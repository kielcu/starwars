<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\People;


class PeopleItemResponse
{
    /** @var string */
    public $name;

    /** @var string */
    public $height;

    /** @var string */
    public $mass;

    /** @var string */
    public $hair_color;

    /** @var string */
    public $skin_color;

    /** @var string */
    public $eye_color;

    /** @var string */
    public $birth_year;

    /** @var string */
    public $gender;

    /** @var string */
    public $homeworld;

    /** @var string[] */
    public $films = [];

    /** @var string[] */
    public $species = [];

    /** @var string[] */
    public $vehicles = [];

    /** @var string[] */
    public $starships = [];

    /** @var string */
    public $created;

    /** @var string */
    public $edited;

    /** @var string */
    public $url;
}