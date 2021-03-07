<?php

namespace App\Models\Frontend\Antrag;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Antrag extends Model
{

//    use Sluggable;
//
//    /**
//     * Return the sluggable configuration array for this model.
//     *
//     * @return array
//     */
//    public function sluggable(): array
//    {
//        return [
//            'slug' => [
//                'source' => 'title'
//            ]
//        ];
//    }

    public $table = 'antrags';

    protected $fillable = [
        'anrede', 'vorname', 'nachname', 'straße', 'plz', 'ort', 'telefon', 'mobil', 'email', 'geburtsdatum', 'beruf', 'facebook', 'twitter', 'instagram', 'beschreibung'
    ];
}
