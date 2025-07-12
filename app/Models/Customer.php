<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_id',
        'customer_name',
        'owner_name',
        'top_type',
        'transaction_limit',
        'ktp_photo_url',
        'npwp_photo_url',
        'address',
        'tax_address',
        'city',
        'phone',
        'notes',
    ];
}
