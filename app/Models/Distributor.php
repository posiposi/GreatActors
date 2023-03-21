<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distributor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'distributor_name',
    ];

    /**
     * リレーション：この会社の配給映画
     *
     * @return void
     */
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
