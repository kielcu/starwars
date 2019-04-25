<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\ServicesAbstract\StarWras\Request;


use App\Services\StarWars\Response\Films\FilmsItemResponse;
use App\Services\StarWars\Response\Films\FilmsResponse;

interface IFilmRequest
{
    public function index(): FilmsResponse;

    public function getById(int $id): FilmsItemResponse;

    public function url(string $url): FilmsItemResponse;
}