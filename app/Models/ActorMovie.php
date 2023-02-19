<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ActorMovie extends Pivot
{
    protected $table = 'actor_movie';

    /**
     * リレーション:俳優が出演する映画での役割
     *
     * @return void
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
