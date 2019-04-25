<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\LogicAbstract\StarWars\Starship;


use App\Models\Starship;
use Illuminate\Support\Collection;

interface IStarshipStarWarsLogic
{
    /**
     * @param string ...$urls
     *
     * @return Collection|Starship[]
     */
    public function getByArrayUrlAndSave(string ...$urls): Collection;

    public function getByUrlAndSave(string $url): Starship;
}