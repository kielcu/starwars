<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\ServicesAbstract\StarWras\Request;


use App\Services\StarWars\Response\Starships\StarshipsItemResponse;
use App\Services\StarWars\Response\Starships\StarshipsResponse;

interface IStarshipsRequest
{

    public function index(): StarshipsResponse;

    public function getById(int $id): StarshipsItemResponse;
}