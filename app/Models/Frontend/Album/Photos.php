<?php

namespace App\Models\Frontend\Album;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static insert(array $photos)
 * @method static where(string $string, string $string1, $id)
 */
class Photos extends Model
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

    protected $table = 'photos';

    public function albums()
    {
        return $this->belongsTo(Album::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
