<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Request;


use GuzzleHttp\Client;

abstract class Request
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var \JsonMapper
     */
    protected $jsonMapper;

    /**
     * Request constructor.
     *
     * @param Client $client
     * @param \JsonMapper $jsonMapper
     */
    public function __construct(Client $client, \JsonMapper $jsonMapper)
    {
        $this->client = $client;
        $this->jsonMapper = $jsonMapper;
        $this->jsonMapper->bStrictNullTypes = false;
    }

    protected function request(string $url, string $method = 'get'): object
    {
        $response = $this->client->request($method, $url);

        return json_decode($response->getBody()->getContents());
    }
}