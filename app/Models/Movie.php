<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 映画クラス
 */
class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->belongsToMany(Actor::class, 'actor_movie', 'movie_id', 'actor_id')->withTimestamps();
    }
}
