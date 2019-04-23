<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 * Date: 2019-04-23
 * Time: 17:17
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Starship extends Model
{
    protected $table = 'starships';

    protected $fillable = [
        'name',
        'model',
        'manufacturer',
        'cost_in_credits',
        'length',
        'max_atmosphering_speed',
        'crew',
        'passengers',
        'cargo_capacity',
        'consumables',
        'hyperdrive_rating',
        'MGLT',
        'starship_class',
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function pilots(): BelongsToMany
    {
        return $this->belongsToMany(
            People::class,
            'people_has_starships',
            'starship_id',
            'people_id',
            'id',
            'id'
        );
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(
            Film::class,
            'films_has_starships',
            'starship_id',
            'film_id',
            'id',
            'id'
        );
    }
}