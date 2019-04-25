<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Repositories\Species;


use App\Models\Species;
use Src\RepositoriesAbstract\Species\ISpeciesRepository;
use App\Services\StarWars\Response\Species\SpeciesItemResponse;
use App\Services\StarWars\StarWarsHelper;

class SpeciesRepository implements ISpeciesRepository
{
    public function saveBySpeciesItemResponse(SpeciesItemResponse $speciesItemResponse): Species
    {
        $id = StarWarsHelper::getIdWithUrl($speciesItemResponse->url);

        $species = Species::query()->findOrNew($id);
        $species->fill((array) $speciesItemResponse);
        $species->id = $id;

        $species->save();

        $species->id = $id;

        return $species;
    }
}