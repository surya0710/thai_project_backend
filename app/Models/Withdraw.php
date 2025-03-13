<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $table = 'withdraw';

    protected $fillable = [
        'user_id',
        'amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function handledBy()
    {
        return $this->belongsTo(User::class, 'handled_by', 'id');
    }

    public function bankDetails(){
        return $this->belongsTo(UserBankDetails::class, 'user_id', 'user_id');
    }
}
