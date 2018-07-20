<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "client";
    protected $fillable = [
        'name', 'street', 'city','tin','phone1','phone2'
    ];   
}
