<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Request;


use App\Services\StarWars\Response\Films\FilmsItemResponse;
use App\Services\StarWars\Response\Films\FilmsResponse;
use Src\ServicesAbstract\StarWras\Request\IFilmRequest;

class FilmsRequest extends Request implements IFilmRequest
{
    const URL = 'films';

    public function index(): FilmsResponse
    {
        $object = $this->request(self::URL);

        return $this->jsonMapper->map($object, new FilmsResponse());
    }

    public function getById(int $id): FilmsItemResponse
    {
        $object = $this->request(self::URL . "/{$id}");

        return $this->jsonMapper->map($object, new FilmsItemResponse());
    }

    public function url(string $url): FilmsItemResponse
    {
        $object = $this->request($url);

        return $this->jsonMapper->map($object, new FilmsItemResponse());
    }
}