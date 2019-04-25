<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\People;

use App\Services\StarWars\Response\Response;

class PeopleResponse extends Response
{
    /** @var PeopleItemResponse[] */
    public $results;
}