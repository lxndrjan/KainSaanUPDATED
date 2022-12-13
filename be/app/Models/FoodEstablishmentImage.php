<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodEstablishmentImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'file_path',
        'food_establishment_id'
    ];

    public function foodEstablishment()
    {
        return $this->belongsTo(FoodEstablishment::class, 'food_establishment_id', 'id');
    }
}
