<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function getRouteKeyName()
    {
        return 'product_id';
    }
}
