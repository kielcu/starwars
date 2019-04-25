<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Src\RepositoriesAbstract\People;


use App\Models\People;
use App\Services\StarWars\Response\People\PeopleItemResponse;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IPeopleRepository
{
    public function saveByPeopleItemResponse(PeopleItemResponse $peopleItemResponse): People;

    public function saveFilms(People $people, Collection $films);

    public function saveVehicles(People $people, Collection $vehicles);

    public function saveSpecies(People $people, Collection $species);

    public function saveStarships(People $people, Collection $starships);

    public function update(People $people): People;

    /**
     * @return LengthAwarePaginator
     */
    public function filterIndex(): LengthAwarePaginator;
}