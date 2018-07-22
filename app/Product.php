<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $fillable = [
        'product_no', 'match_code', 'hsn_code','description','mrp','tax','sales_nml','spl_l','spl_m','invoice_price','unit_pr','act_stock_status','pmk_status','act_total','sales_nrm','spl_low','spl_n','total_sales','hand','value1','rmd_hand','pmk_hand','him_stck_ttl','him_hand','value2'
    ];

}
