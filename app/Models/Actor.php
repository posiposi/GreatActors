<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 俳優モデル
 */
class Actor extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'actor_name'
    ];

    /**
     * リレーション:この俳優が出演する映画　
     *
     * @return void
     */
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'actor_movie', 'actor_id', 'movie_id')->withTimestamps();
    }

    /**
     * リレーション:俳優が出演するこの映画での役割
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(Movie::class)->using(ActorMovie::class)->withPivot(['role_id']);
    }
}
