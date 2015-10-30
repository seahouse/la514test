<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Charass extends Model
{
    //
    protected $fillable = [
        'target_type',
        'target_id',
        'char_id',
        'value',
        'default',
        'price',
    ];
    
    public function char() {
        return $this->hasOne('App\Product\Characteristic', 'id', 'char_id');
    }
}
