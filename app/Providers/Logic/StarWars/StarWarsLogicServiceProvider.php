<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Providers\Logic\StarWars;


use App\Logic\StarWars\Film\FilmStarWarsLogic;
use App\Logic\StarWars\People\ManyPeopleStarWarsLogic;
use App\Logic\StarWars\People\PeopleRelationStarWarsLogic;
use App\Logic\StarWars\People\PeopleStarWarsLogic;
use App\Logic\StarWars\Planet\PlanetStarWarsLogic;
use App\Logic\StarWars\Species\SpeciesStarWarsLogic;
use App\Logic\StarWars\Starship\StarshipStarWarsLogic;
use App\Logic\StarWars\Vehicle\VehicleStarWarsLogic;
use Src\LogicAbstract\StarWars\Film\IFilmStarWarsLogic;
use Src\LogicAbstract\StarWars\People\IManyPeopleStarWarsLogic;
use Src\LogicAbstract\StarWars\People\IPeopleRelationStarWarsLogic;
use Src\LogicAbstract\StarWars\People\IPeopleStarWarsLogic;
use Src\LogicAbstract\StarWars\Planet\IPlanetStarWarsLogic;
use Src\LogicAbstract\StarWars\Species\ISpeciesStarWarsLogic;
use Src\LogicAbstract\StarWars\Starship\IStarshipStarWarsLogic;
use Src\LogicAbstract\StarWars\Vehicle\IVehicleStarWarsLogic;
use Illuminate\Support\ServiceProvider;

class StarWarsLogicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IFilmStarWarsLogic::class, FilmStarWarsLogic::class);
        $this->app->bind(IManyPeopleStarWarsLogic::class, ManyPeopleStarWarsLogic::class);
        $this->app->bind(IPeopleRelationStarWarsLogic::class, PeopleRelationStarWarsLogic::class);
        $this->app->bind(IPeopleStarWarsLogic::class, PeopleStarWarsLogic::class);
        $this->app->bind(IPlanetStarWarsLogic::class, PlanetStarWarsLogic::class);
        $this->app->bind(ISpeciesStarWarsLogic::class, SpeciesStarWarsLogic::class);
        $this->app->bind(IStarshipStarWarsLogic::class, StarshipStarWarsLogic::class);
        $this->app->bind(IVehicleStarWarsLogic::class, VehicleStarWarsLogic::class);
    }
}