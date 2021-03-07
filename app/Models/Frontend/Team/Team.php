<?php

namespace App\Models\Frontend\Team;

use App\Models\Frontend\Fahrzeuge\Fahrzeuge;
use App\Models\Intern\Miete\MieteMitglied;
use App\Models\Intern\Miete\Zahlung;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static where(string $string, string $string1, bool $true)
 */
class Team extends Model
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

    public $table = 'teams';

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function fahrzeuges()
    {
        return $this->hasMany(Fahrzeuge::class);
    }

    public function miete_mitgliedsbeitrag()
    {
        return $this->hasMany(MieteMitglied::class);
    }

    public function zahlung()
    {
        return $this->hasMany(Zahlung::class);
    }
}
