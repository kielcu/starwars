<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\LogicAbstract\StarWars\Film;


use App\Models\Film;
use Illuminate\Support\Collection;

interface IFilmStarWarsLogic
{
    /**
     * @param string ...$urls
     *
     * @return Collection|Film[]
     */
    public function getByArrayUrlAndSave(string ...$urls): Collection;

    public function getByUrlAndSave(string $url): Film;
}