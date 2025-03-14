<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasksHistory extends Model
{
    use HasFactory;

    protected $table = 'tasks_history';

    protected $fillable = [
        'user_id',
        'product_id',
        'earned_amount',
        'product_amount',
    ];
}
