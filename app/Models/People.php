<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
            'character_id',
            'film_id',
            'id',
            'id'
        );
    }

    public function species(): BelongsToMany
    {
        return $this->belongsToMany(
            Species::class,
            'people_has_species',
            'people_id',
            'species_id',
            'id',
            'id'
        );
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(
            Vehicle::class,
            'people_has_vehicles',
            'people_id',
            'vehicle_id',
            'id',
            'id'
        );
    }

    public function starships(): BelongsToMany
    {
        return $this->belongsToMany(
            Starship::class,
            'people_has_starships',
            'people_id',
            'starship_id',
            'id',
            'id'
        );
    }
}