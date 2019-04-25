<?php

namespace App\Jobs\StarWars\People;

use App\Logic\StarWars\People\PeopleStarWarsLogic;
use App\Services\StarWars\Response\People\PeopleItemResponse;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class GetRelationsOfPeopleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var PeopleItemResponse
     */
    private $peopleItemResponse;

    /**
     * Create a new job instance.
     *
     * @param PeopleItemResponse $peopleItemResponse
     */
    public function __construct(PeopleItemResponse $peopleItemResponse)
    {
        $this->peopleItemResponse = $peopleItemResponse;
    }

    /**
     * Execute the job.
     *
     * @param PeopleStarWarsLogic $peopleStarWarsLogic
     *
     * @return void
     */
    public function handle(PeopleStarWarsLogic $peopleStarWarsLogic)
    {
        $peopleStarWarsLogic->saveWithRelationsByPeopleItemResponse($this->peopleItemResponse);
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        Log::error($exception->getMessage());
    }
}
