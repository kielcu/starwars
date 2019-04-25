<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\ServicesAbstract\StarWras\Request;


use App\Services\StarWars\Response\Species\SpeciesItemResponse;
use App\Services\StarWars\Response\Species\SpeciesResponse;

interface ISpeciesRequest
{
    public function index(): SpeciesResponse;

    public function getById(int $id): SpeciesItemResponse;
}