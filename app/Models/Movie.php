<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_name',
        'release_year',
        'air_time'
    ];

    /**
     * リレーション：この映画に出演する俳優
     *
     * @return void
     */
    public function actors()
    {
        $this->belongsToMany(Actor::class);
    }
}
