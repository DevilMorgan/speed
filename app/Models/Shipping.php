<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    protected $appends = ['final_price'];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getFinalPriceAttribute()
    {
        return request()->adminIsManager? $this->total_price: $this->customer_price;
    }
    public function getChargeOn()
    {
       return  trans('site.order_print_charge_on_' . $this->charge_on);
    }

    // public function setOrderNumAttribute($value = null)
    // {
    //     return $this->attributes['order_num'] = $this->order;
    // }

}
