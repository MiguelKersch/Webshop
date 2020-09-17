<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'OrderDetails';
    protected $fillable = [
       
    ];
    public function order()
    {
        return $this->hasOne('App\Orders');
    }
}
