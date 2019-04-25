<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Providers;


use App\Repositories\People\PeopleRepository;
use App\Repositories\Planet\PlanetRepository;
use App\Repositories\Species\SpeciesRepository;
use App\Repositories\Starship\StarshipRepository;
use App\Repositories\Vehicle\VehicleRepository;
use App\Repositories\Film\FilmRepository;
use Src\RepositoriesAbstract\Film\IFilmRepository;
use Src\RepositoriesAbstract\People\IPeopleRepository;
use Src\RepositoriesAbstract\Planet\IPlanetRepository;
use Src\RepositoriesAbstract\Species\ISpeciesRepository;
use Src\RepositoriesAbstract\Starship\IStarshipRepository;
use Src\RepositoriesAbstract\Vehicle\IVehicleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
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
        $this->app->bind(IFilmRepository::class, FilmRepository::class);
        $this->app->bind(IPeopleRepository::class, PeopleRepository::class);
        $this->app->bind(IPlanetRepository::class, PlanetRepository::class);
        $this->app->bind(ISpeciesRepository::class, SpeciesRepository::class);
        $this->app->bind(IStarshipRepository::class, StarshipRepository::class);
        $this->app->bind(IVehicleRepository::class, VehicleRepository::class);
    }
}