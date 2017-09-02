<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    public $table = 'games';

    protected $fillable = [
        'game',
        'user_id',
        'game_date',
        'updated_at',
        'created_at'
    ];
}
