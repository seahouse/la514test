<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'item_number',
        'item_name',
        'item_descrip',
        'itemclass_id',
        'itemtype_id',
        'marketprice',
    ];
    
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
//     protected $with = ['itemcalss'];

    public function itemclass() {
        return $this->hasOne('App\Itemclass', 'id', 'itemclass_id');
    }    
    
    public function itemtype() {
        return $this->hasOne('App\Itemtype', 'id', 'itemtype_id');
    }
}
