<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{
    protected $table = "purchase_products";
    protected $fillable = [
        'purchase_id','quantity'
    ];
}
