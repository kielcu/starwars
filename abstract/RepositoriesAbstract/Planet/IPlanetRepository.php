<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\RepositoriesAbstract\Planet;


use App\Models\Planet;
use App\Services\StarWars\Response\Planets\PlanetsItemResponse;

interface IPlanetRepository
{
    public function saveByPlanetsItemResponse(PlanetsItemResponse $planetsItemResponse): Planet;
}