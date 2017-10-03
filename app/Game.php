<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    public $table = 'games';

    protected $fillable = [
        'match_id',
        'league_id',
        'user_id',
        'updated_at',
        'created_at'
    ];
}
