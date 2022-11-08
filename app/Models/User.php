<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded =[];
    protected $table = 'users';


    protected $fillable = [
        'id',
        'emtype',
        'roleid',
        'emimg',
        'emid',
        'pnid',
        'fullname',
        'birthday',
        'gender',
        'bankimg',
        'bankname',
        'banknumber',
        'salary',
        'taxname',
        'department',
        'startwork',
        'email',
        'phonenumber',
        'password',
        'banknumber',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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
    // auth()->user()->sendOfferNotification(new OffersNotification($user));
}