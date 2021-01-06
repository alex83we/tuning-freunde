<?php

namespace App\Models\Frontend\Fahrzeuge;

use App\Models\Frontend\Team\Team;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $id)
 */
class Fahrzeuge extends Model
{
    use Sluggable;

    public $table = 'fahrzeuges';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'fahrzeug'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }
}
