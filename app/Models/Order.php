<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_name',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'country',
        'phone_number',
        'email_address',
        'total',
        'cart_items',
    ];

    protected $casts = [
        'cart_items' => 'array',
    ];
}
