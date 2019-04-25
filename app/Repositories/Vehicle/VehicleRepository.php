<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Repositories\Vehicle;


use App\Models\Vehicle;
use Src\RepositoriesAbstract\Vehicle\IVehicleRepository;
use App\Services\StarWars\Response\Vehicles\VehiclesItemResponse;
use App\Services\StarWars\StarWarsHelper;

class VehicleRepository implements IVehicleRepository
{
    public function saveByVehicleItemResponse(VehiclesItemResponse $vehiclesItemResponse): Vehicle
    {
        $id = StarWarsHelper::getIdWithUrl($vehiclesItemResponse->url);

        $vehicle = Vehicle::query()->findOrNew($id);
        $vehicle->fill((array) $vehiclesItemResponse);
        $vehicle->id = $id;

        $vehicle->save();

        $vehicle->id = $id;

        return $vehicle;
    }

}