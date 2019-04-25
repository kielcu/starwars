<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\LogicAbstract\StarWars\People;


use App\Models\People;

interface IPeopleRelationStarWarsLogic
{
    public function saveFilmsRelation(People $people, string ...$urls);

    public function saveVehiclesRelation(People $people, string ...$urls);

    public function saveSpeciesRelation(People $people, string ...$urls);

    public function saveStarshipsRelation(People $people, string ...$urls);

    public function savePlanetRelation(People $people, ?string $url);
}