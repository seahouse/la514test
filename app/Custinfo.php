<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custinfo extends Model
{
    //
    protected $fillable = [
        'number',
        'name',
        'contact_id',
        'comments',
    ];
    
    public function contact() {
        return $this->hasOne('App\Contact', 'id', 'contact_id');
    }
}
