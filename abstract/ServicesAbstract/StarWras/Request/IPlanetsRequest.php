<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\ServicesAbstract\StarWras\Request;


use App\Services\StarWars\Response\Planets\PlanetsItemResponse;
use App\Services\StarWars\Response\Planets\PlanetsResponse;

interface IPlanetsRequest
{
    public function index(): PlanetsResponse;

    public function getById(int $id): PlanetsItemResponse;
}