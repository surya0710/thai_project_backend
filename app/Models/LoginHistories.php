<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginHistories extends Model
{
    use HasFactory;

    protected $table = 'login_histories';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
