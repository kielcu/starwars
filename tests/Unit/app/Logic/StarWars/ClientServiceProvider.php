<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Tests\Unit\app\Logic\StarWars;


use App\Services\StarWars\Request\FilmsRequest;
use App\Services\StarWars\Request\PeopleRequest;
use App\Services\StarWars\Request\PlanetsRequest;
use App\Services\StarWars\Request\SpeciesRequest;
use App\Services\StarWars\Request\StarshipsRequest;
use App\Services\StarWars\Request\VehiclesRequest;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

trait ClientServiceProvider
{
    protected function initClient(HandlerStack $handler)
    {
        $this->app->when([
            PeopleRequest::class,
            FilmsRequest::class,
            PlanetsRequest::class,
            SpeciesRequest::class,
            StarshipsRequest::class,
            VehiclesRequest::class
        ])
            ->needs(Client::class)
            ->give(function () use ($handler) {
                return new Client(['handler' => $handler]);
            });
    }
}