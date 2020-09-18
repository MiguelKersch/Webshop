<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    protected $table = 'orders_product';
    protected $fillable = ['order_id', 'product_id', 'quantity' , 'price'];
    public $timestamps = false;
}
