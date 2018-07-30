<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $fillable = [
        'hsn_id','product_no','product_name','mrp','sales','invoice_price','stock','value'
    ];

}
