<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InviteCode extends Model
{
    use HasFactory;

    protected $table = 'invitation_code';

    protected $fillable = [
        'code',
        'status',
        'count',
        'user_id',
        'created_by',
    ];
}
