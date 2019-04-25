<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\LogicAbstract\StarWars\Species;


use App\Models\Species;
use Illuminate\Support\Collection;

interface ISpeciesStarWarsLogic
{
    /**
     * @param string ...$urls
     *
     * @return Collection|Species[]
     */
    public function getByArrayUrlAndSave(string ...$urls): Collection;

    public function getByUrlAndSave(string $url): Species;
}