<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Request;


use App\Services\StarWars\Response\Vehicles\VehiclesItemResponse;
use App\Services\StarWars\Response\Vehicles\VehiclesResponse;
use Src\ServicesAbstract\StarWras\Request\IVehiclesRequest;

class VehiclesRequest extends Request implements IVehiclesRequest
{
    const URL = 'vehicles';

    public function index(): VehiclesResponse
    {
        $object = $this->request(self::URL);

        return $this->jsonMapper->map($object, new VehiclesResponse());
    }

    public function getById(int $id): VehiclesItemResponse
    {
        $object = $this->request(self::URL . "/{$id}");

        return $this->jsonMapper->map($object, new VehiclesItemResponse());
    }
}