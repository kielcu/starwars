<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\RepositoriesAbstract\Film;


use App\Models\Film;
use App\Services\StarWars\Response\Films\FilmsItemResponse;

interface IFilmRepository
{
    public function saveByFilmItemResponse(FilmsItemResponse $filmsItemResponse): Film;
}