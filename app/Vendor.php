<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public $fillable = [
        'vname',
        'vaddress'
    ];

    /**
     * The customers that belong to the vendor.
     */
    public function customers()
    {
        return $this->belongsToMany('App\Customer','customer_vendor','vendor_id','customer_id')->withTimestamps();
    }
}
