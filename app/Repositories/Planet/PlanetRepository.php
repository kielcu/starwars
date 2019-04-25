<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Repositories\Planet;


use App\Models\Planet;
use Src\RepositoriesAbstract\Planet\IPlanetRepository;
use App\Services\StarWars\Response\Planets\PlanetsItemResponse;
use App\Services\StarWars\StarWarsHelper;

class PlanetRepository implements IPlanetRepository
{
    public function saveByPlanetsItemResponse(PlanetsItemResponse $planetsItemResponse): Planet
    {
        $id = StarWarsHelper::getIdWithUrl($planetsItemResponse->url);

        $planet = Planet::query()->findOrNew($id);
        $planet->fill((array) $planetsItemResponse);
        $planet->id = $id;

        $planet->save();

        $planet->id = $id;

        return $planet;
    }

}