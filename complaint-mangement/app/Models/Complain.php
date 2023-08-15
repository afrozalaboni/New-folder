<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'title',
        'category',
        'description',
        'phone',
        'address',
        'status',
        'technician_id',
        'technician_name',
        'deadline',
        'requested_deadline',
        'delay_description',
        'feedback',
        'payment_status',
        'method',
        'tnx_id',
        'amount',
    ];
}
