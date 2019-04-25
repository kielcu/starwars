<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\Planets;


use App\Services\StarWars\Response\Response;

class PlanetsResponse extends Response
{
    /** @var PlanetsItemResponse[] */
    public $result;
}