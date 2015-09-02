<?php

namespace App\Purchase;

use Illuminate\Database\Eloquent\Model;

class Vendinfo extends Model
{
    //
    protected $fillable = [
        'name',
        'active',
        'po',
        'comments',
        'number',
        'term_id',
        'shipvia',
        'vendtype_id',
        'contact1_id',
        'contact2_id',
        'addr_id',
    ];
}
