<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodEstablishment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'store_name',
        'coords',
        'address',
        'category',
        'cuisine_type',
        'views',
        'parking_info',
        'average_cost',
        'store_description',
        'rating'
    ];

    protected $casts = [
        'coords' => 'array'
    ];

    public function favorites()
    {
        return $this->hasMany(MyFavorite::class);
    }

    // public function userFavorite()
    // {
    //     return $this->favorites()->where('user_id', auth()->user()->id)->first();
    // }

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(FoodEstablishmentImage::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
