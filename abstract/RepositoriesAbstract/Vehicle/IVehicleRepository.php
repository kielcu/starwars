<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\RepositoriesAbstract\Vehicle;


use App\Models\Vehicle;
use App\Services\StarWars\Response\Vehicles\VehiclesItemResponse;

interface IVehicleRepository
{
    public function saveByVehicleItemResponse(VehiclesItemResponse $vehiclesItemResponse): Vehicle;
}