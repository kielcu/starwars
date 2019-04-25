<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Repositories\People;


use App\Models\People;
use App\Repositories\People\Filters\PeopleFilters;
use Src\RepositoriesAbstract\People\IPeopleRepository;
use App\Services\StarWars\Response\People\PeopleItemResponse;
use App\Services\StarWars\StarWarsHelper;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

class PeopleRepository implements IPeopleRepository
{
    public function saveByPeopleItemResponse(PeopleItemResponse $peopleItemResponse): People
    {
        $id = StarWarsHelper::getIdWithUrl($peopleItemResponse->url);

        $people = People::query()->findOrNew($id);
        $people->fill((array) $peopleItemResponse);
        $people->id = $id;

        $people->save();

        $people->id = $id;

        return $people;
    }

    public function saveFilms(People $people, Collection $films)
    {
        $people->films()->sync($films->pluck('id')->toArray());
    }

    public function saveVehicles(People $people, Collection $vehicles)
    {
        $people->vehicles()->sync($vehicles->pluck('id')->toArray());
    }

    public function saveSpecies(People $people, Collection $species)
    {
        $people->species()->sync($species->pluck('id')->toArray());
    }

    public function saveStarships(People $people, Collection $starships)
    {
        $people->starships()->sync($starships->pluck('id')->toArray());
    }

    public function update(People $people): People
    {
        $people->save();

        return $people;
    }


    /**
     * @return LengthAwarePaginator
     */
    public function filterIndex(): LengthAwarePaginator
    {
        $query = People::query()
            ->select('id', 'name', 'height', 'planet_id')
            ->with([
                'homeworld' => function(HasOne $query) {
                    $query->select('id', 'name');
                },
                'films' => function(BelongsToMany $query) {
                    $query->select('id', 'title');
                },
                'species'
            ]);

        return $this->filter($query)->paginate(5);

    }

    protected function filter(Builder $builder): Builder
    {
        /** @var PeopleFilters $filter */
        $filter = app(PeopleFilters::class);
        return $filter->apply($builder);
    }
}