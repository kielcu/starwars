<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\LogicAbstract\StarWars\Planet;


use App\Models\Planet;

interface IPlanetStarWarsLogic
{
    public function getByUrlAndSave(string $url): Planet;
}