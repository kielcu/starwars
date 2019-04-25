<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\Species;


use App\Services\StarWars\Response\Response;

class SpeciesResponse extends Response
{
    /** @var SpeciesItemResponse[] */
    public $result;
}