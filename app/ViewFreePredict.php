<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewFreePredict extends Model
{
    //
    public $table = 'view_free_predict';

    protected $fillable = [
        'user_id',
        'count'
    ];
}
