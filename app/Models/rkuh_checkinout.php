<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class rkuh_checkinout extends Authenticatable
{
    protected $table = 'rkuh_checkinout';
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'userid',
        'out_datetime',
        'in_datetime',
        'reason',
        'action_datetime',
        'action_by',
        'actual_out_datetime',
        'actual_out_by',
        'actual_in_datetime',
        'achual_in_by',
        'status',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

