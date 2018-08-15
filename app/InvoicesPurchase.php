<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicesPurchase extends Model
{
    protected $table = "invoices_purchase";
    protected $fillable = [
        'invoice_id','product_code','hsn','mrp','product_name','quantity','price','gst','amount','updated_at'
    ];
}
