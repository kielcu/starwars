<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 * Date: 2019-04-23
 * Time: 17:12
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Planet extends Model
{
    protected $table = 'planets';

    protected $fillable = [
        'name',
        'rotation_period',
        'orbital_period',
        'diameter',
        'climate',
        'gravity',
        'terrain',
        'surface_water',
        'population',
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function residents(): HasMany
    {
        return $this->hasMany(
            People::class,
            'id',
            'people_id'
        );
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(
            Film::class,
            'films_has_planets',
            'planet_id',
            'film_id',
            'id',
            'id'
        );
    }
}