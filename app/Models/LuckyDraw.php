<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuckyDraw extends Model
{
    use HasFactory;

    protected $table = 'set_lucky_draw';

    protected $fillable = [
        'user_id',
        'set_by',
        'show_at',
        'for_badge',
        'exceeding_amount',
    ];
}
