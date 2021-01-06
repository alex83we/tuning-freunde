<?php

namespace App\Models\History;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
