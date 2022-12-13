<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'review',
        'user_name',
        'food_establishment_id',
        'rating'
    ];

    public function foodEstablishment()
    {
        return $this->belongsTo(FoodEstablishment::class, 'food_establishment_id', 'id');
    }
}
