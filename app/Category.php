<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    
    
    public function products(){

    	return $this->belongsToMany(Product::class);
    }

    public function getRouteKeyName()
    {

    	return 'name';

    }

    

}
