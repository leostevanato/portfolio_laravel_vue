<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'title',
        'slug',
        'description',
        'url',
        'image'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['skills'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function skills() {
        return $this->belongsToMany(Skill::class);
    }
}
