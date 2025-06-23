<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_id', 'name', 'quantity', 'unit',
        'calories', 'protein', 'carbs', 'fat'
    ];

    public function meal() {
        return $this->belongsTo(Meal::class);
    }
}
