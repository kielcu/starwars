<?php

namespace App\Console\Commands;

use App\Logic\StarWars\People\ManyPeopleStarWarsLogic;
use Illuminate\Console\Command;

class PeopleWithRelationsSynchronizeStarWarsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:star_wars:people_with_relations {qty}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronize data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param ManyPeopleStarWarsLogic $peopleStarWarsLogic
     *
     * @return mixed
     */
    public function handle(ManyPeopleStarWarsLogic $peopleStarWarsLogic)
    {
        $qty = $this->argument('qty');

        if (!$qty) {
            $qty = 100;
        }

        $peopleStarWarsLogic->getPeopleWithRelations($qty);
    }
}
