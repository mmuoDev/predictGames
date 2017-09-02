<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    //
    public $table = 'predictions';

    protected $fillable = [
        'game_id',
        'prediction_id',
        'updated_at',
        'created_at'
    ];
}
