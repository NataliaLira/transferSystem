<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table="transfers";

    protected $fillable = [
        'payer','payee', 'value'
    ];
}
