<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\Films;


use App\Services\StarWars\Response\Response;

class FilmsResponse extends Response
{
    /** @var FilmsItemResponse[] */
    public $results;
}