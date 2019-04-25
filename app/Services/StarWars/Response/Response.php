<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars\Response;


abstract class Response
{
    /** @var int */
    public $count;

    /** @var string|null */
    public $next;

    /** @var string|null */
    public $previous;
}