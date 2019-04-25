<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\ServicesAbstract\StarWras\Request;


use App\Services\StarWars\Response\People\PeopleItemResponse;
use App\Services\StarWars\Response\People\PeopleResponse;

interface IPeopleRequest
{
    public function index(): PeopleResponse;

    public function getById(int $id): PeopleItemResponse;

    public function url(string $url): PeopleResponse;
}