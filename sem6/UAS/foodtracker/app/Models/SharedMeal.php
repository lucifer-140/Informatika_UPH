<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedMeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_id', 'shared_to'
    ];

    public function meal() {
        return $this->belongsTo(Meal::class);
    }

    public function sharedUser() {
        return $this->belongsTo(User::class, 'shared_to');
    }
}
