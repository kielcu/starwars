<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Logic\StarWars\Species;


use Src\LogicAbstract\StarWars\Species\ISpeciesStarWarsLogic;
use App\Models\Species;
use Src\RepositoriesAbstract\Species\ISpeciesRepository;
use App\Services\StarWars\StarWarsHelper;
use Src\ServicesAbstract\StarWras\Request\ISpeciesRequest;
use Illuminate\Support\Collection;

class SpeciesStarWarsLogic implements ISpeciesStarWarsLogic
{
    /**
     * @var ISpeciesRequest
     */
    private $speciesRequest;
    /**
     * @var ISpeciesRepository
     */
    private $speciesRepository;

    public function __construct(ISpeciesRequest $speciesRequest, ISpeciesRepository $speciesRepository)
    {
        $this->speciesRequest = $speciesRequest;
        $this->speciesRepository = $speciesRepository;
    }

    /**
     * @param string ...$urls
     *
     * @return Collection|Species[]
     */
    public function getByArrayUrlAndSave(string ...$urls): Collection
    {
        $species = collect([]);

        foreach ($urls as $url) {
            $speciesItem = $this->getByUrlAndSave($url);
            $species->push($speciesItem);
        }

        return $species;
    }

    public function getByUrlAndSave(string $url): Species
    {
        try {
            $id = StarWarsHelper::getIdWithUrl($url);
            $speciesItemResponse = $this->speciesRequest->getById($id);

            $species = $this->speciesRepository->saveBySpeciesItemResponse($speciesItemResponse);

        } catch (\Exception|\TypeError $exception) {
            //todo log
            return new Species();
        }

        return $species;
    }
}