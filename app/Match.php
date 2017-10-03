<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
{
    //
    use SoftDeletes;

    public $table = 'matches';

    protected $fillable = [
        'league_id',
        'match',
        'match_date'
    ];

}
