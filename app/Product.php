<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'Product';
    protected $fillable = ['name', 'description', 'price' ];
    public $timestamps = false;
    public function category()
    {
        return $this->belongsToMany('App\Category');
    }
    public function orders(){
        return $this->belongsToMany('App\Orders');
    }
}
