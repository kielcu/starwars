<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\Films;


class FilmsItemResponse
{
    /** @var string */
    public $title;

    /** @var string */
    public $episode_id;

    /** @var string */
    public $opening_crawl;

    /** @var string */
    public $director;

    /** @var string */
    public $producer;

    /** @var string */
    public $release_date;

    /** @var string[] */
    public $characters = [];

    /** @var string[] */
    public $planets = [];

    /** @var string[] */
    public $starships = [];

    /** @var string[] */
    public $vehicles = [];

    /** @var string[] */
    public $species = [];

    /** @var string */
    public $created;

    /** @var string */
    public $edited;

    /** @var string */
    public $url;
}