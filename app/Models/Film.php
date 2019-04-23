<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 * Date: 2019-04-23
 * Time: 17:11
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    protected $table = 'films';

    protected $fillable = [
        'title',
        'episode_id',
        'opening_crawl',
        'director',
        'producer',
        'release_date'
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(
            People::class,
            'films_has_characters',
            'film_id',
            'character_id',
            'id',
            'id'
        );
    }

    public function planets(): BelongsToMany
    {
        return $this->belongsToMany(
            Planet::class,
            'films_has_planets',
            'film_id',
            'planet_id',
            'id',
            'id'
        );
    }

    public function species(): BelongsToMany
    {
        return $this->belongsToMany(
            Species::class,
            'films_has_species',
            'film_id',
            'species_id',
            'id',
            'id'
        );
    }

    public function starships(): BelongsToMany
    {
        return $this->belongsToMany(
            Starship::class,
            'films_has_starships',
            'film_id',
            'starship_id',
            'id',
            'id'
        );
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(
            Vehicle::class,
            'films_has_vehicles',
            'film_id',
            'vehicle_id',
            'id',
            'id'
        );
    }
}