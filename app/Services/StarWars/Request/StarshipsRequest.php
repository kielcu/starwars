<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Request;


use App\Services\StarWars\Response\Starships\StarshipsItemResponse;
use App\Services\StarWars\Response\Starships\StarshipsResponse;
use Src\ServicesAbstract\StarWras\Request\IStarshipsRequest;

class StarshipsRequest extends Request implements IStarshipsRequest
{
    const URL = 'starships';

    public function index(): StarshipsResponse
    {
        $object = $this->request(self::URL);

        return $this->jsonMapper->map($object, new StarshipsResponse());
    }

    public function getById(int $id): StarshipsItemResponse
    {
        $object = $this->request(self::URL . "/{$id}");

        return $this->jsonMapper->map($object, new StarshipsItemResponse());
    }
}