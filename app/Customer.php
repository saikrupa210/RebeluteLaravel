<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    public $fillable = [
        'cname',
        'caddress',
        'cphone'
    ];
    /**
     * The vendors that belong to the customer.
     */
    public function vendors()
    {
        return $this->belongsToMany('App\Vendor','customer_vendor','customer_id','vendor_id')->withTimestamps();
    }
}
