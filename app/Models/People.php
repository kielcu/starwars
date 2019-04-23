<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 * Date: 2019-04-23
 * Time: 14:39
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class People extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'name',
        'height',
        'mass',
        'hair_color',
        'skin_color',
        'eye_color',
        'birth_year',
        'gender'
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function homeworld(): HasOne
    {
        return $this->hasOne(
            Planet::class,
            'id',
            'planet_id'
        );
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(
            Film::class,
            'films_has_characters',
            'film_id',
            'character_id',
            'id',
            'id'
        );
    }

    public function species(): BelongsToMany
    {
        return $this->belongsToMany(
            Species::class,
            'people_has_species',
            'species_id',
            'people_id',
            'id',
            'id'
        );
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(
            Vehicle::class,
            'people_has_vehicles',
            'vehicle_id',
            'people_id',
            'id',
            'id'
        );
    }

    public function starships(): BelongsToMany
    {
        return $this->belongsToMany(
            Starship::class,
            'people_has_starships',
            'starship_id',
            'people_id',
            'id',
            'id'
        );
    }
}