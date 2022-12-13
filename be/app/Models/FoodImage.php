<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'file_path',
        'food_id'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }
}
