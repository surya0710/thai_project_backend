<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'url',
        'price',
        'image_path',
    ];

    public function taskStatus(){
        return $this->belongsTo(TasksHistory::class, 'id', 'product_id');
    }

    public function checkTaskCompletion()
    {
        return $this->hasMany(TasksHistory::class, 'product_id', 'id');
    }

}
