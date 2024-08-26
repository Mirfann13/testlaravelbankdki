<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'is_blocked', 'login_attempts',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_blocked' => 'boolean',
    ];

    public function pembukaanRekenings()
    {
        return $this->hasMany(PembukaanRekening::class, 'created_by');
    }

    public function approvedRekenings()
    {
        return $this->hasMany(PembukaanRekening::class, 'approved_by');
    }
}