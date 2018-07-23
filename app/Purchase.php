<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "purchase";
    protected $fillable = [
        'invoice_number','invoice_date','invoice_amount','taxable','sgst','cgst'
    ];
}
