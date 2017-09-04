<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sys_rating extends Model
{
    //
    public $table = 'sys_ratings';

    protected $fillable = [
        'user_id',
        'poor',
        'good',
        'expert'
    ];
}
