<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Lukasz
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    protected $table = 'vehicles';

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
        'vehicle_class'
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function pilots(): BelongsToMany
    {
        return $this->belongsToMany(
            People::class,
            'people_has_vehicles',
            'vehicle_id',
            'people_id',
            'id',
            'id'
        );
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(
            Film::class,
            'films_has_vehicles',
            'vehicle_id',
            'film_id',
            'id',
            'id'
        );
    }
}