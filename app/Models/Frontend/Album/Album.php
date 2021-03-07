<?php

namespace App\Models\Frontend\Album;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, bool $true)
 */
class Album extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = 'albums';

    public function photos()
    {
        return $this->hasMany(Photos::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
