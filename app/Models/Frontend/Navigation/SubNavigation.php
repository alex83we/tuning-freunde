<?php

namespace App\Models\Frontend\Navigation;

use Illuminate\Database\Eloquent\Model;

class SubNavigation extends Model
{
    protected $table = 'subnavigations';

    public $timestamps = false;

    protected $fillable = [
        'name', 'title', 'slug', 'navigation_id', 'published'
    ];

    public function subnavigation()
    {
        return $this->belongsTo(Navigation::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
