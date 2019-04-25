<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\RepositoriesAbstract\Species;


use App\Models\Species;
use App\Services\StarWars\Response\Species\SpeciesItemResponse;

interface ISpeciesRepository
{
    public function saveBySpeciesItemResponse(SpeciesItemResponse $speciesItemResponse): Species;

}