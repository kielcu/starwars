<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Logic\StarWars\Starship;


use Src\LogicAbstract\StarWars\Starship\IStarshipStarWarsLogic;
use App\Models\Starship;
use Src\RepositoriesAbstract\Starship\IStarshipRepository;
use App\Services\StarWars\StarWarsHelper;
use Src\ServicesAbstract\StarWras\Request\IStarshipsRequest;
use Illuminate\Support\Collection;

class StarshipStarWarsLogic implements IStarshipStarWarsLogic
{

    /**
     * @var IStarshipsRequest
     */
    private $starshipsRequest;
    /**
     * @var IStarshipRepository
     */
    private $starshipRepository;

    public function __construct(IStarshipsRequest $starshipsRequest, IStarshipRepository $starshipRepository)
    {
        $this->starshipsRequest = $starshipsRequest;
        $this->starshipRepository = $starshipRepository;
    }

    /**
     * @param string ...$urls
     *
     * @return Collection|Starship[]
     */
    public function getByArrayUrlAndSave(string ...$urls): Collection
    {
        $starships = collect([]);

        foreach ($urls as $url) {
            $film = $this->getByUrlAndSave($url);
            $starships->push($film);
        }

        return $starships;
    }

    public function getByUrlAndSave(string $url): Starship
    {
        try {
            $id = StarWarsHelper::getIdWithUrl($url);
            $starshipItemResponse = $this->starshipsRequest->getById($id);

            $starship = $this->starshipRepository->saveByStarshipItemResponse($starshipItemResponse);
        } catch (\Exception|\TypeError $exception) {
            //todo log
            return new Starship();
        }

        return $starship;
    }
}