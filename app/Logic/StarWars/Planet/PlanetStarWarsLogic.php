<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Logic\StarWars\Planet;


use Src\LogicAbstract\StarWars\Planet\IPlanetStarWarsLogic;
use App\Models\Planet;
use Src\RepositoriesAbstract\Planet\IPlanetRepository;
use App\Services\StarWars\StarWarsHelper;
use Src\ServicesAbstract\StarWras\Request\IPlanetsRequest;

class PlanetStarWarsLogic implements IPlanetStarWarsLogic
{
    /**
     * @var IPlanetsRequest
     */
    private $planetsRequest;
    /**
     * @var IPlanetRepository
     */
    private $planetRepository;

    public function __construct(IPlanetsRequest $planetsRequest, IPlanetRepository $planetRepository)
    {
        $this->planetsRequest = $planetsRequest;
        $this->planetRepository = $planetRepository;
    }

    public function getByUrlAndSave(string $url): Planet
    {
        try {
            $id = StarWarsHelper::getIdWithUrl($url);
            $planetItemResponse = $this->planetsRequest->getById($id);

            $planet = $this->planetRepository->saveByPlanetsItemResponse($planetItemResponse);
        } catch (\Exception|\TypeError $exception) {
            return new Planet();
        }

        return $planet;
    }
}