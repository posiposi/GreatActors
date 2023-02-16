<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 俳優モデル
 */
class Actor extends Model
{
    use HasFactory;

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
        $this->belongsToMany(Movie::class);
    }
}
