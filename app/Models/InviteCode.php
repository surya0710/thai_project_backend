<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InviteCode extends Model
{
    use HasFactory;

    protected $table = 'invite_code';

    protected $fillable = [
        'code',
        'status',
        'count',
        'user_id',
        'created_by',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function usedBy(){
        return $this->belongsTo(User::class, 'used_by', 'id');
    }
}
