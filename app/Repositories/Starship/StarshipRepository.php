<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Repositories\Starship;


use App\Models\Starship;
use Src\RepositoriesAbstract\Starship\IStarshipRepository;
use App\Services\StarWars\Response\Starships\StarshipsItemResponse;
use App\Services\StarWars\StarWarsHelper;

class StarshipRepository implements IStarshipRepository
{
    public function saveByStarshipItemResponse(StarshipsItemResponse $starshipsItemResponse): Starship
    {
        $id = StarWarsHelper::getIdWithUrl($starshipsItemResponse->url);

        $starship = Starship::query()->findOrNew($id);
        $starship->fill((array) $starshipsItemResponse);
        $starship->id = $id;

        $starship->save();

        $starship->id = $id;

        return $starship;
    }
}