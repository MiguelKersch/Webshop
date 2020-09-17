<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'Product';
    protected $fillable = ['name', 'description', 'price' , 'category_id'];
    public function category()
    {
        return $this->belongsToMany('App\Category');
    }
}
