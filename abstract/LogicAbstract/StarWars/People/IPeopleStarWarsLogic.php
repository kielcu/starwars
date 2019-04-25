<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\LogicAbstract\StarWars\People;


use App\Models\People;
use App\Services\StarWars\Response\People\PeopleItemResponse;

interface IPeopleStarWarsLogic
{
    public function saveWithRelationsByPeopleItemResponse(PeopleItemResponse $peopleItemResponse): People;

    public function saveRelations(People $people, PeopleItemResponse $peopleItemResponse);
}