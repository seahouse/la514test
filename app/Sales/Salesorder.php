<?php

namespace App\Sales;

use Illuminate\Database\Eloquent\Model;

class Salesorder extends Model
{
    protected $table = 'soheads';
    
    //
    protected $fillable = [
        'number',
        'custinfo_id',
        'orderdate',
        'warehouse_id',
        'shipto',
        'salesrep_id',
        'term_id',
        'comments',
    ];
    
    public function custinfo() {
        return $this->hasOne('App\Custinfo', 'id');
    }
    
    public function warehouse() {
        return $this->hasOne('App\Inventory\Warehouse', 'id');
    }
    
    public function salesrep() {
        return $this->hasOne('App\Sales\Salesrep', 'id');
    }
    
    public function term() {
        return $this->hasOne('App\Sales\Term', 'id');
    }
}
