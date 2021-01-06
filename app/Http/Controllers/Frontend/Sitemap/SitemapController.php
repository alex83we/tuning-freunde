<?php

namespace App\Http\Controllers\Frontend\Sitemap;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Fahrzeuge\Fahrzeuge;
use App\Models\Frontend\Team\Team;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public function index(Request $request)
    {
        /*$teams = Team::orderBy('id', 'desc')->where('aktiv', '=', true)->get();
        $fahrzeuges = Fahrzeuge::orderBy('id', 'desc')->where('published', '=', true)->get();

        return response()->view('frontend.sitemap', compact('teams', 'fahrzeuges'))->header('Content-Type', 'text/xml');*/

        $path = 'sitemap.xml';
        SitemapGenerator::create('https://www.thueringer-tuning-freunde.de')->writeToFile($path);

        return 'sitemap created';
    }
}
