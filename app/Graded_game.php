<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graded_game extends Model
{
    //
    public $table = 'graded_games';

    protected $fillable = [
        'game_id',
        'user_id'
    ];
}
