<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Logic\StarWars\Film;


use App\Models\Film;
use Src\RepositoriesAbstract\Film\IFilmRepository;
use App\Services\StarWars\Request\FilmsRequest;
use App\Services\StarWars\StarWarsHelper;
use Illuminate\Support\Collection;
use Src\ServicesAbstract\StarWras\Request\IFilmRequest;

class FilmStarWarsLogic
{
    /**
     * @var FilmsRequest
     */
    private $filmsRequest;
    /**
     * @var IFilmRepository
     */
    private $filmRepository;

    public function __construct(IFilmRequest $filmsRequest, IFilmRepository $filmRepository)
    {
        $this->filmsRequest = $filmsRequest;
        $this->filmRepository = $filmRepository;
    }


    /**
     * @param string ...$urls
     *
     * @return Collection|Film[]
     */
    public function getByArrayUrlAndSave(string ...$urls): Collection
    {
        $films = collect([]);

        foreach ($urls as $url) {
            $film = $this->getByUrlAndSave($url);
            $films->push($film);
        }

        return $films;
    }

    public function getByUrlAndSave(string $url): Film
    {
        $id = StarWarsHelper::getIdWithUrl($url);

        if (!$id) {
            return new Film();
        }

        try {
            $filmItemResponse = $this->filmsRequest->getById($id);
            $film = $this->filmRepository->saveByFilmItemResponse($filmItemResponse);
        } catch (\Exception|\TypeError $exception) {
            //log
            return new Film();
        }

        return $film;
    }
}