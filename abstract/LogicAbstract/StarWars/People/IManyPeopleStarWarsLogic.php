<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\LogicAbstract\StarWars\People;


interface IManyPeopleStarWarsLogic
{
    public function getPeopleWithRelations(int $qty): bool;
}