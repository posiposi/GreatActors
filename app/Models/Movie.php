<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Distributor;

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
        'air_time',
        'distributor_id',
        'genre_id',
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

    /**
     * リレーション：この映画の配給会社
     *
     * @return void
     */
    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    /**
     * リレーション：この映画のジャンル
     *
     * @return void
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
