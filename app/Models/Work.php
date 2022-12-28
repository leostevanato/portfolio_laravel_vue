<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'url',
        'image',
        'visible'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['skills'];

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class);
    }

    public function skills() {
        return $this->belongsToMany(Skill::class);
    }
}
