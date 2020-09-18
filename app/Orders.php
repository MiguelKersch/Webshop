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
    
    public function product(){
        return $this->belongsToMany('App\Product')->withPivot('quantity')->withPivot('price');
    }
}
