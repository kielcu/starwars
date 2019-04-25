<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Repositories\Film;


use App\Models\Film;
use App\Services\StarWars\Response\Films\FilmsItemResponse;
use App\Services\StarWars\StarWarsHelper;
use Src\RepositoriesAbstract\Film\IFilmRepository;

class FilmRepository implements IFilmRepository
{
    public function saveByFilmItemResponse(FilmsItemResponse $filmsItemResponse): Film
    {
        $id = StarWarsHelper::getIdWithUrl($filmsItemResponse->url);

        $film = Film::query()->findOrNew($id);
        $film->fill((array) $filmsItemResponse);
        $film->id = $id;

        $film->save();

        $film->id = $id;

        return $film;
    }
}