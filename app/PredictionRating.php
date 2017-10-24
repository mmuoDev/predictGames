<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PredictionRating extends Model
{
    //
    public $table = 'prediction_ratings';

    protected $fillable = [
        'rating',
        'game_id',
        'predictor_id',
        'user_id'
    ];
}
