<?php

namespace App\Models\Intern\Miete;

use App\Models\Frontend\Team\Team;
use Illuminate\Database\Eloquent\Model;

class MieteMitglied extends Model
{
    protected $table = 'miete_mitgliedsbeitrag';

    protected $fillable = [
        'type',
        'betrag'
    ];

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }

//    public function zahlung()
//    {
//        return $this->belongsToMany(Zahlung::class, 'miete_zahlung');
//    }
}