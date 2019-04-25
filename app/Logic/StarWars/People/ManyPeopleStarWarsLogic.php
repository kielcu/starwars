<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Logic\StarWars\People;


use App\Jobs\StarWars\People\GetRelationsOfPeopleJob;
use Src\LogicAbstract\StarWars\People\IManyPeopleStarWarsLogic;
use Src\ServicesAbstract\StarWras\Request\IPeopleRequest;
use Src\ServicesAbstract\StarWras\Request\IPlanetsRequest;
use Psr\Log\LoggerInterface;

class ManyPeopleStarWarsLogic implements IManyPeopleStarWarsLogic
{
    /**
     * @var IPlanetsRequest
     */
    private $peopleRequest;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(IPeopleRequest $peopleRequest, LoggerInterface $logger)
    {
        $this->peopleRequest = $peopleRequest;
        $this->logger = $logger;
    }

    public function getPeopleWithRelations(int $qty): bool
    {
        $peopleQty = 0;
        try {
            /** @var PeopleResponse $peopleResponse */
            $peopleResponse = $this->peopleRequest->index();
        } catch (ClientException $clientException) {
            $this->logger->error($clientException->getMessage());
            return false;
        }

        foreach ($peopleResponse->results as $result) {
            GetRelationsOfPeopleJob::dispatch($result);
            $peopleQty++;
            if ($peopleQty >= $qty) return true;
        }

        while ($peopleResponse->next && $peopleQty < $qty) {
            try {
                $peopleResponse = $this->peopleRequest->url($peopleResponse->next);
            } catch (ClientException $clientException) {
                $this->logger->error($clientException->getMessage());
                continue;
            }

            foreach ($peopleResponse->results as $result) {
                GetRelationsOfPeopleJob::dispatch($result);
                $peopleQty++;
            }
        }

        return true;
    }
}