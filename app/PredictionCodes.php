<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PredictionCodes extends Model
{
    //
    public $table = 'prediction_codes';

    protected $fillable = [
        'code',
        'definition'
    ];
}
