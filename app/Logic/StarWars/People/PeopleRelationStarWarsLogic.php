<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Logic\StarWars\People;


use Src\LogicAbstract\StarWars\Film\IFilmStarWarsLogic;
use Src\LogicAbstract\StarWars\People\IPeopleRelationStarWarsLogic;
use Src\LogicAbstract\StarWars\Planet\IPlanetStarWarsLogic;
use Src\LogicAbstract\StarWars\Species\ISpeciesStarWarsLogic;
use Src\LogicAbstract\StarWars\Starship\IStarshipStarWarsLogic;
use Src\LogicAbstract\StarWars\Vehicle\IVehicleStarWarsLogic;
use Src\RepositoriesAbstract\People\IPeopleRepository;
use App\Models\People;

class PeopleRelationStarWarsLogic implements IPeopleRelationStarWarsLogic
{
    /**
     * @var IFilmStarWarsLogic
     */
    private $filmStarWarsLogic;
    /**
     * @var IPlanetStarWarsLogic
     */
    private $planetStarWarsLogic;
    /**
     * @var IVehicleStarWarsLogic
     */
    private $vehicleStarWarsLogic;
    /**
     * @var IStarshipStarWarsLogic
     */
    private $starshipStarWarsLogic;
    /**
     * @var ISpeciesStarWarsLogic
     */
    private $speciesStarWarsLogic;
    /**
     * @var IPeopleRepository
     */
    private $peopleRepository;

    public function __construct(
        IPeopleRepository $peopleRepository,
        IFilmStarWarsLogic $filmStarWarsLogic,
        IPlanetStarWarsLogic $planetStarWarsLogic,
        IVehicleStarWarsLogic $vehicleStarWarsLogic,
        IStarshipStarWarsLogic $starshipStarWarsLogic,
        ISpeciesStarWarsLogic $speciesStarWarsLogic
    )
    {
        $this->filmStarWarsLogic = $filmStarWarsLogic;
        $this->planetStarWarsLogic = $planetStarWarsLogic;
        $this->vehicleStarWarsLogic = $vehicleStarWarsLogic;
        $this->starshipStarWarsLogic = $starshipStarWarsLogic;
        $this->speciesStarWarsLogic = $speciesStarWarsLogic;
        $this->peopleRepository = $peopleRepository;
    }

    public function saveFilmsRelation(People $people, string ...$urls)
    {
        try {
            $films = $this->filmStarWarsLogic->getByArrayUrlAndSave(...$urls);
            $this->peopleRepository->saveFilms($people, $films);
        } catch (\Exception $exception) {
            //todo log
        }
    }

    public function saveVehiclesRelation(People $people, string ...$urls)
    {
        try {
            $vehicles = $this->vehicleStarWarsLogic->getByArrayUrlAndSave(...$urls);
            $this->peopleRepository->saveVehicles($people, $vehicles);
        } catch (\Exception $exception) {
            //todo log
        }
    }

    public function saveSpeciesRelation(People $people, string ...$urls)
    {
        try {
            $species = $this->speciesStarWarsLogic->getByArrayUrlAndSave(...$urls);
            $this->peopleRepository->saveSpecies($people, $species);
        } catch (\Exception $exception) {
            //todo log
        }
    }

    public function saveStarshipsRelation(People $people, string ...$urls)
    {
        try {
            $starships = $this->starshipStarWarsLogic->getByArrayUrlAndSave(...$urls);
            $this->peopleRepository->saveStarships($people, $starships);
        } catch (\Exception $exception) {
            //todo log
        }
    }

    public function savePlanetRelation(People $people, ?string $url)
    {
        if (!$url) return;

        try {
            $planet = $this->planetStarWarsLogic->getByUrlAndSave($url);
            $people->planet_id = $planet->id;

            $this->peopleRepository->update($people);
        }catch (\Exception $exception) {
            //todo log
        }
    }
}