<?php

use App\Http\Controllers\Auth\WelcomeController;
use App\Models\Frontend\Fahrzeuge\Fahrzeuge;
use App\Models\Frontend\Navigation\Navigation;
use App\Models\Frontend\Team\Team;
use App\Notifications\AntragEingang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Spatie\WelcomeNotification\WelcomesNewUsers;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('sitemap','Frontend\Sitemap\SitemapController@index');

Route::get('/', function () {
    $navigation = Navigation::with('subnavigation')->get();
    $team = Team::where('aktiv', '=', true)->count();
    $fahrzeuge = Fahrzeuge::where('published', '=', true)->count();

    return view('frontend.index', compact('navigation', $navigation, 'team', 'fahrzeuge'));
});

Route::get('/home', function () {
    $navigation = Navigation::with('subnavigation')->get();
    $team = Team::where('aktiv', '=', true)->count();
    $fahrzeuge = Fahrzeuge::where('published', '=', true)->count();

    return view('frontend.index', compact('navigation', $navigation, 'team', 'fahrzeuge'));
});

/*// Benachrichtigungen
Route::get('markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');
Route::get('markAsDelete', function () {
    auth()->user()->notifications()->delete();
    return redirect()->back();
})->name('markAsDelete');*/

/*Route::get('test', function () {
    $when = Carbon::now()->addSeconds(10);
    $user = User::role('Super Admin')->get();
    $antrag = \App\Models\Frontend\Team\Team::find(2);
    foreach ($user as $item) {
        $notifiy = User::find($item->id)->notify((new AntragEingang($antrag))->delay($when));
    }
//    User::find($notifiy)->notify((new AntragEingang)->delay($when));
//    $admin = User::role('Admin')->get()->notify((new AntragEingang)->delay($when));

//    return $when;
//     return 'message versendet!';
    return $notifiy;
});*/

Auth::routes();

Route::prefix('intern')->namespace('Intern')->name('intern.')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Telefonliste
    Route::get('telefonliste', 'Telefonliste\TelefonlisteController@index')->name('telefonliste.index');

    // Geburtstagsliste
    Route::get('geburtstagsliste', 'Geburtstagsliste\GeburtstagslisteController@index')->name('geburtstagsliste.index');

    // User
    Route::resource('user', 'User\UserController');

    // Team
    Route::resource('team', 'Team\TeamController', ['except' => ['create', 'destroy']]);

    // Miete
    Route::resource('miete', 'Miete\MieteController');
    Route::resource('zahlung', 'Miete\ZahlungController');
    Route::get('chart-miete', 'Miete\MieteChartController@index');

    // Hebebuehne
    Route::get('hebebuehne', 'Hebebuehne\HebebuehneController@index');
    Route::post('hebebuehne/create', 'Hebebuehne\HebebuehneController@create');
    Route::post('hebebuehne/update', 'Hebebuehne\HebebuehneController@update');
    Route::post('hebebuehne/delete', 'Hebebuehne\HebebuehneController@destroy');

    // Rollen
    Route::resource('role', 'Role\RoleController');
    Route::get('antrag', 'Antrag\AntragCheckedController@index')->name('antrag.index');
    Route::get('antrag/{antrag:id}', 'Antrag\AntragCheckedController@show')->name('antrag.show');
    Route::match(['PUT', 'PATCH'], 'antrag/checked/{antrag}', 'Antrag\AntragCheckedController@checked')->name('antrag.updateChecked');
    Route::match(['PUT', 'PATCH'], 'antrag/revoke/{antrag}', 'Antrag\AntragRevokeController@revoke')->name('antrag.updateRevoke');

    // Satzung
    Route::get('satzung', function () {
       return view('intern.satzung.index');
    })->name('satzung.index');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','Intern\Role\RoleController');
    Route::resource('users','Intern\User\UserController');
    Route::get('downloads', function () {
        return view('frontend.downloads.index');
    });
});

Route::namespace('Frontend')->name('frontend.')->group(function () {
    Route::get('ueber-uns', 'Ueberuns\UeberUnsController@index')->name('ueber-uns');

    Route::resource('team', 'Team\TeamController');

    Route::resource('fahrzeuge', 'Fahrzeuge\FahrzeugeController');
    Route::match(['PUT', 'PATCH'], 'fahrzeuge/published/{fahrzeuge}', 'Fahrzeuge\FahrzeugeController@published')->name('fahrzeuge.published');
    Route::match(['PUT', 'PATCH'], 'fahrzeuge/unpublished/{fahrzeuge}', 'Fahrzeuge\FahrzeugeController@unpublished')->name('fahrzeuge.unpublished');

    Route::resource('galerie', 'Album\AlbumController');

    Route::resource('galerie/photos', 'Album\PhotosController', ['except' => ['index', 'create', 'store', 'show']]);
    Route::delete('galerie/photos/{photo:id}', 'Album\PhotosController@destroy')->name('photos.destroy');
    Route::get('galerie/photos/photo/{photo}/bearbeiten', 'Album\PhotosController@editPhoto')->name('photos.editPhoto');
    Route::match(['PUT', 'PATCH'], 'galerie/photos/preview/{photo}', 'Album\PhotosController@updatePreview')->name('photos.updatePreview');

    Route::resource('veranstaltungen', 'Veranstaltungen\VeranstaltungenController');
    Route::match(['PUT', 'PATCH'], 'veranstaltungen', 'Veranstaltungen\VeranstaltungenController@published')->name('veranstaltungen.published');

    Route::resource('antrag', 'Antrag\AntragController');

    Route::resource('kontakt', 'Kontakt\KontaktController');

    Route::resource('gaestebuch', 'Gaestebuch\GaestebuchController', ['except' => ['edit', 'show']]);

    Route::view('impressum', 'frontend.impressum')->name('impressum');
    Route::view('datenschutz', 'frontend.datenschutz')->name('datenschutz');
    Route::view('cookies', 'frontend.cookies')->name('cookies');
});

Route::group(['middleware' => ['web', WelcomesNewUsers::class,]], function () {
    Route::get('willkommen/{user}', [WelcomeController::class, 'showWelcomeForm'])->name('welcome');
    Route::post('willkommen/{user}', [WelcomeController::class, 'savePassword']);
});

/*// reCapatcha
Route::get('form', 'GoogleReCaptchaController@index');
Route::post('store', 'GoogleReCaptchaController@store');*/
