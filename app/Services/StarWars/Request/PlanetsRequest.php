<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Request;


use App\Services\StarWars\Response\Planets\PlanetsItemResponse;
use App\Services\StarWars\Response\Planets\PlanetsResponse;
use Src\ServicesAbstract\StarWras\Request\IPlanetsRequest;

class PlanetsRequest extends Request implements IPlanetsRequest
{
    const URL = 'planets';

    public function index(): PlanetsResponse
    {
        $object = $this->request(self::URL);

        return $this->jsonMapper->map($object, new PlanetsResponse());
    }

    public function getById(int $id): PlanetsItemResponse
    {
        $object = $this->request(self::URL . "/{$id}");

        return $this->jsonMapper->map($object, new PlanetsItemResponse());
    }
}