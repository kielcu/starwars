<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace Tests\Unit\app\Logic\StarWars;


class DataMap
{
    private const PATH = __DIR__ . '/../../../../data/';

    private const FILE_PEOPLE_ITEM = 'people_item.json';
    private const FILE_PEOPLE_PAGE_1 = 'people_page_1.json';
    private const FILE_PEOPLE_PAGE_2 = 'people_page_2.json';
    private const FILE_FILMS_ITEM = 'films_item.json';
    private const FILE_PLANETS_ITEM = 'planets_item.json';
    private const FILE_SPECIES_ITEM = 'species_item.json';
    private const FILE_STARSHIPS_ITEM = 'starships_item.json';
    private const FILE_VEHICLES_ITEM = 'vehicles_item.json';
    private const FILE_NOT_FOUND = 'not_found.json';

    public static function getPeopleItem()
    {
        return self::getFile(self::FILE_PEOPLE_ITEM);
    }

    public static function getPeoplePage1()
    {
        return self::getFile(self::FILE_PEOPLE_PAGE_1);
    }

    public static function getPeoplePage2()
    {
        return self::getFile(self::FILE_PEOPLE_PAGE_2);
    }

    public static function getFilmsItem()
    {
        return self::getFile(self::FILE_FILMS_ITEM);
    }

    public static function getPlanetsItem()
    {
        return self::getFile(self::FILE_PLANETS_ITEM);
    }

    public static function getSpeciesItem()
    {
        return self::getFile(self::FILE_SPECIES_ITEM);
    }

    public static function getStarshipsItem()
    {
        return self::getFile(self::FILE_STARSHIPS_ITEM);
    }

    public static function getVehiclesItem()
    {
        return self::getFile(self::FILE_VEHICLES_ITEM);
    }

    public static function getNotFound()
    {
        return self::getFile(self::FILE_NOT_FOUND);
    }

    public static function map(string $file, object $object): object
    {
        return app(\JsonMapper::class)->map(json_decode($file), $object);
    }

    protected static function getFile(string $name): string
    {
        return file_get_contents(self::PATH . $name);
    }
}