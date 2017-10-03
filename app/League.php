<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    //
    public $table = 'leagues';

    protected $fillable = [
        'league',
        'slug'
    ];
}
