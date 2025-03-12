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

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function approver(){
        return $this->belongsTo(User::class, 'handled_by', 'id');
    }
}
