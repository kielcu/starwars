<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\LogicAbstract\StarWars\Vehicle;


use App\Models\Vehicle;
use Illuminate\Support\Collection;

interface IVehicleStarWarsLogic
{
    /**
     * @param string ...$urls
     *
     * @return Collection|Vehicle[]
     */
    public function getByArrayUrlAndSave(string ...$urls): Collection;

    public function getByUrlAndSave(string $url): Vehicle;
}