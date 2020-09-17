<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'Orders';
    protected $fillable = [
        'user_id',
        'user_email',
        'user_name',
        'price'
    ];
    public function orderDetails()
    {
        return $this->hasOne('App\OrderDetails');
    }
}
