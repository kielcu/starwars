<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Repositories\People\Filters;


use App\Services\Filters\Filters;

class PeopleFilters extends Filters
{
    protected $filters = [
        'name'
    ];

    public function name(string $name)
    {
        $this->builder->where('name', '=', $name);
    }
}