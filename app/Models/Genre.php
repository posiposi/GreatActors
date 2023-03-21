<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_theme',
    ];

    /**
     * リレーション:このジャンルの映画
     *
     * @return void
     */
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
