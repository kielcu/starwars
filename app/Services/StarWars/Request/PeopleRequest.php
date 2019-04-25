<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Request;


use App\Services\StarWars\Response\People\PeopleItemResponse;
use App\Services\StarWars\Response\People\PeopleResponse;
use Src\ServicesAbstract\StarWras\Request\IPeopleRequest;

class PeopleRequest extends Request implements IPeopleRequest
{
    const URL = 'people';

    public function index(): PeopleResponse
    {
        $object = $this->request(self::URL);

        return $this->jsonMapper->map($object, new PeopleResponse());
    }

    public function getById(int $id): PeopleItemResponse
    {
        $object = $this->request(self::URL . "/{$id}");

        return $this->jsonMapper->map($object, new PeopleItemResponse());
    }

    public function url(string $url): PeopleResponse
    {
        $object = $this->request($url);

        return $this->jsonMapper->map($object, new PeopleResponse());
    }
}