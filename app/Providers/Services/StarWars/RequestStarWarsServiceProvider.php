<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Providers\Services\StarWars;


use App\Services\StarWars\Request\FilmsRequest;
use App\Services\StarWars\Request\PeopleRequest;
use App\Services\StarWars\Request\PlanetsRequest;
use App\Services\StarWars\Request\SpeciesRequest;
use App\Services\StarWars\Request\StarshipsRequest;
use App\Services\StarWars\Request\VehiclesRequest;
use Src\ServicesAbstract\StarWras\Request\IFilmRequest;
use Src\ServicesAbstract\StarWras\Request\IPeopleRequest;
use Src\ServicesAbstract\StarWras\Request\IPlanetsRequest;
use Src\ServicesAbstract\StarWras\Request\ISpeciesRequest;
use Src\ServicesAbstract\StarWras\Request\IStarshipsRequest;
use Src\ServicesAbstract\StarWras\Request\IVehiclesRequest;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class RequestStarWarsServiceProvider extends ServiceProvider
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
        $this->app->bind(IFilmRequest::class, FilmsRequest::class);
        $this->app->bind(IPeopleRequest::class, PeopleRequest::class);
        $this->app->bind(IPlanetsRequest::class, PlanetsRequest::class);
        $this->app->bind(ISpeciesRequest::class, SpeciesRequest::class);
        $this->app->bind(IStarshipsRequest::class, StarshipsRequest::class);
        $this->app->bind(IVehiclesRequest::class, VehiclesRequest::class);

        $this->app->when([
            PeopleRequest::class,
            FilmsRequest::class,
            PlanetsRequest::class,
            SpeciesRequest::class,
            StarshipsRequest::class,
            VehiclesRequest::class
        ])
            ->needs(Client::class)
            ->give(function(){
                return new Client([
                    'base_uri' => 'https://swapi.co/api/',
                    'verify' => false
                ]);
            });
    }
}