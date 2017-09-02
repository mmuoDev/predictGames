<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MakeFreePredict extends Model
{
    //
    public $table = 'make_free_predict';

    protected $fillable = [
        'user_id',
        'count'
    ];
}
