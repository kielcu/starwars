<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response\Starships;


use App\Services\StarWars\Response\Response;

class StarshipsResponse extends Response
{
    /** @var StarshipsItemResponse[] */
    public $result;
}