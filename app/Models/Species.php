<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 * Date: 2019-04-23
 * Time: 17:14
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Species extends Model
{
    protected $table = 'species';

    protected $fillable = [
        'name',
        'classification',
        'designation',
        'average_height',
        'skin_colors',
        'hair_colors',
        'eye_colors',
        'average_lifespan',
        'language',
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function homeworld(): HasOne
    {
        return $this->hasOne(Planet::class, 'id', 'planet_id');
    }

    public function people(): BelongsToMany
    {
        return $this->belongsToMany(
            People::class,
            'people_has_species',
            'species_id',
            'people_id',
            'id',
            'id'
        );
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(
            Film::class,
            'films_has_species',
            'species_id',
            'film_id',
            'id',
            'id'
        );
    }
}