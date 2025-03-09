<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargeRequest extends Model
{
    use HasFactory;

    protected $table = 'recharge_request';
    protected $fillable = [
        'user_id',
        'amount',
        'recharge_proof',
        'status',
    ];
}
