<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $table = "invoices";
    protected $fillable = [
        'invoice_number','invoice_date','client_code','name','street','city','tin','phone1','sub_total','cgst_6','cgst_9','cgst_14','sgst_6','sgst_9','sgst_14','gst_12','gst_18','gst_28','grand_total'
    ];
}
