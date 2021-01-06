<?php

namespace App\Models\Frontend\Navigation;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigations';

    public $timestamps = false;

    protected $fillable = [
        'name', 'title', 'slug', 'sort'
    ];

    public function subnavigation()
    {
        return $this->hasMany(SubNavigation::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getNavigation()
    {
        $navigation = Navigation::with('subnavigation')->get();
    }
}
