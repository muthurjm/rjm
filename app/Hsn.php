<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hsn extends Model
{
    protected $table = "hsn";
    protected $fillable = [
        'hsn_code','tax'
    ];
     // product
     public function product()
     {
         return $this->hasMany('App\Product');
     }

}
