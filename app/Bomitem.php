<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bomitem extends Model
{
    //
    protected $fillable = [
        'parent_item_id',
        'item_id',
        'qtyper',
    ];
}
