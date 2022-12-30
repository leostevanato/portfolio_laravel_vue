<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    /**
     * Accessor for returning a list of portfolios with id and title + language.
     */
    public function getListPortfoliosAttribute()
    {
        $userPortfolios = $this->portfolios;

        $portfolios = array();

        foreach($userPortfolios as $portfolio) {
            $portfolios[] = array('id' => $portfolio['id'], 'title' => $portfolio['title'] .' ('. $portfolio['language'] .')');
        }

        return $portfolios;
    }
}
