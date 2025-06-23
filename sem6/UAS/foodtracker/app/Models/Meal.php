<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'meal_name', 'meal_date',
        'image_url', 'total_calories', 'total_protein',
        'total_carbs', 'total_fat'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ingredients() {
        return $this->hasMany(Ingredient::class);
    }

    public function sharedTo() {
        return $this->hasMany(SharedMeal::class);
    }
}
