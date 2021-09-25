<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'price',
        'bimbel',
        'name',
        'email',
        'phone',
        'dob',
        'gender',
        'instance',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getStatus()
    {
        $prices = ['regular'=>2,'premium'=>4,'gold'=>6];
        if($this->test_results->count()>$prices[$this->price]){
            return '<span class="badge bg-gradient-success">Finish</span>';
        }else{
            return '<span class="badge bg-gradient-info">On Going</span>';
        }
    }

    public function test_results()
    {
        return $this->hasMany(TestResult::class);
    }
}
