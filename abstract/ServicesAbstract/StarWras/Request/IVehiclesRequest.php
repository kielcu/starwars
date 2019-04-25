<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\ServicesAbstract\StarWras\Request;


use App\Services\StarWars\Response\Vehicles\VehiclesItemResponse;
use App\Services\StarWars\Response\Vehicles\VehiclesResponse;

interface IVehiclesRequest
{

    public function index(): VehiclesResponse;

    public function getById(int $id): VehiclesItemResponse;
}