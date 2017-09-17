<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $fillable = [
        'user_id',
        'subscriber_id',
        'amount',
        'status',
        'transaction_reference',
        'card',
    ];


    public function Predictor()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Subscriber()
    {
        return $this->belongsTo('App\User', 'subscriber_id');
    }
}