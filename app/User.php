<?php

namespace App;

use App\Models\History\LoginHistory;
use App\Notifications\AntragEingang;
use App\Notifications\WillkommenNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Client\Request;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\WelcomeNotification\ReceivesWelcomeNotification;

/**
 * @method static find($id)
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $input)
 * @method static where(string $string, string $string1, $user_id)
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use ReceivesWelcomeNotification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vorname', 'nachname', 'email', 'password', 'banned', 'is_checked', 'last_login_at', 'last_login_ip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'banned'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param Carbon $validUntil
     */
    public function sendWelcomeNotification(Carbon $validUntil)
    {
        $this->notify(new WillkommenNotification($validUntil));
    }

    public function login_histories()
    {
        return $this->hasMany(LoginHistory::class);
    }

    public function sendAntragNotifications($antrag)
    {
        $this->notify(new AntragEingang($antrag));
    }
}
