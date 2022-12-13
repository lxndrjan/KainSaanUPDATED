<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visited extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'food_establishment_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function foodEstablishment()
    {
        return $this->belongsTo(FoodEstablishment::class, 'food_establishment_id', 'id');
    }
}
