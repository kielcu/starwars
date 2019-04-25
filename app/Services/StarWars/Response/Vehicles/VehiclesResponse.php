<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\Vehicles;


use App\Services\StarWars\Response\Response;

class VehiclesResponse extends Response
{
    /** @var VehiclesItemResponse[] */
    public $result;
}