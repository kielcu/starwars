<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\RepositoriesAbstract\Starship;


use App\Models\Starship;
use App\Services\StarWars\Response\Starships\StarshipsItemResponse;

interface IStarshipRepository
{
    public function saveByStarshipItemResponse(StarshipsItemResponse $starshipsItemResponse): Starship;
}