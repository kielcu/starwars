<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Request;


use App\Services\StarWars\Response\Species\SpeciesItemResponse;
use App\Services\StarWars\Response\Species\SpeciesResponse;
use Src\ServicesAbstract\StarWras\Request\ISpeciesRequest;

class SpeciesRequest extends Request implements ISpeciesRequest
{
    const URL = 'species';

    public function index(): SpeciesResponse
    {
        $object = $this->request(self::URL);

        return $this->jsonMapper->map($object, new SpeciesResponse());
    }

    public function getById(int $id): SpeciesItemResponse
    {
        $object = $this->request(self::URL . "/{$id}");

        return $this->jsonMapper->map($object, new SpeciesItemResponse());
    }
}