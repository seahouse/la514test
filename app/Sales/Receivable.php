<?php

namespace App\Sales;

use Illuminate\Database\Eloquent\Model;

class Receivable extends Model
{
    //
    protected $fillable = [
        'sohead_id',
        'amount',
        'recvdate',
        'notes',
    ];
    
    public function sohead() {
        return $this->hasOne('App\Sales\Salesorder', 'id', 'sohead_id');
    }
}
