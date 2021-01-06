<?php

namespace App\Models\Intern\Miete;

use App\Models\Frontend\Team\Team;
use Illuminate\Database\Eloquent\Model;

class Zahlung extends Model
{
    protected $table = 'zahlung';

    protected $fillable = [
        'type',
        'last_paid',
        'paid',
        'betrag'
    ];

//    public function miete_mitgliedsbeitrag()
//    {
//        return $this->belongsToMany(MieteMitglied::class, 'miete_zahlung');
//    }

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }
}