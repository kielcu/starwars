<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Logic\StarWars\People;


use Src\LogicAbstract\StarWars\People\IPeopleStarWarsLogic;
use App\Models\People;
use Src\RepositoriesAbstract\People\IPeopleRepository;
use App\Services\StarWars\Response\People\PeopleItemResponse;
use Src\ServicesAbstract\StarWras\Request\IPeopleRequest;

class PeopleStarWarsLogic implements IPeopleStarWarsLogic
{
    /**
     * @var IPeopleRequest
     */
    private $peopleRequest;
    /**
     * @var IPeopleRepository
     */
    private $peopleRepository;
    /**
     * @var PeopleRelationStarWarsLogic
     */
    private $peopleRelationStarWarsLogic;

    public function __construct(IPeopleRequest $peopleRequest, IPeopleRepository $peopleRepository, PeopleRelationStarWarsLogic $peopleRelationStarWarsLogic)
    {
        $this->peopleRequest = $peopleRequest;
        $this->peopleRepository = $peopleRepository;
        $this->peopleRelationStarWarsLogic = $peopleRelationStarWarsLogic;
    }

    public function saveWithRelationsByPeopleItemResponse(PeopleItemResponse $peopleItemResponse): People
    {
        try {
            $people = $this->peopleRepository->saveByPeopleItemResponse($peopleItemResponse);
            $this->saveRelations($people, $peopleItemResponse);
        } catch (\Exception| \TypeError $exception) {
            //todo log
            $people = new People();
        }

        return $people;
    }

    public function saveRelations(People $people, PeopleItemResponse $peopleItemResponse)
    {
        try {
            $this->peopleRelationStarWarsLogic->saveFilmsRelation($people, ...$peopleItemResponse->films);
            $this->peopleRelationStarWarsLogic->saveVehiclesRelation($people, ...$peopleItemResponse->vehicles);
            $this->peopleRelationStarWarsLogic->saveSpeciesRelation($people, ...$peopleItemResponse->species);
            $this->peopleRelationStarWarsLogic->saveStarshipsRelation($people, ...$peopleItemResponse->starships);
            $this->peopleRelationStarWarsLogic->savePlanetRelation($people, $peopleItemResponse->homeworld);
        } catch (\Exception $exception) {
            //todo log
        }
    }


}