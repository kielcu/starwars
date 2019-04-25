<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Services\StarWars;


class StarWarsHelper
{
    public static function getIdWithUrl(string $url): ?int
    {
        preg_match('/.*\/([0-9]+)\/$/', $url, $matches);

        if (isset($matches[1])) {
            return (int) $matches[1];
        }

        return null;
    }
}