<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Logic\StarWars\Vehicle;


use Src\LogicAbstract\StarWars\Vehicle\IVehicleStarWarsLogic;
use App\Models\Vehicle;
use Src\RepositoriesAbstract\Vehicle\IVehicleRepository;
use App\Services\StarWars\StarWarsHelper;
use Src\ServicesAbstract\StarWras\Request\IVehiclesRequest;
use Illuminate\Support\Collection;

class VehicleStarWarsLogic implements IVehicleStarWarsLogic
{
    /**
     * @var IVehiclesRequest
     */
    private $vehiclesRequest;
    /**
     * @var IVehicleRepository
     */
    private $vehicleRepository;

    public function __construct(IVehiclesRequest $vehiclesRequest, IVehicleRepository $vehicleRepository)
    {
        $this->vehiclesRequest = $vehiclesRequest;
        $this->vehicleRepository = $vehicleRepository;
    }


    /**
     * @param string ...$urls
     *
     * @return Collection|Vehicle[]
     */
    public function getByArrayUrlAndSave(string ...$urls): Collection
    {
        $vehicles = collect([]);

        foreach ($urls as $url) {
            $film = $this->getByUrlAndSave($url);
            $vehicles->push($film);
        }

        return $vehicles;
    }

    public function getByUrlAndSave(string $url): Vehicle
    {
        try {
            $id = StarWarsHelper::getIdWithUrl($url);
            $vehicleItemResponse = $this->vehiclesRequest->getById($id);

            $vehicle = $this->vehicleRepository->saveByVehicleItemResponse($vehicleItemResponse);
        } catch (\Exception|\TypeError $exception) {
            //todo log
            return new Vehicle();
        }

        return $vehicle;
    }
}