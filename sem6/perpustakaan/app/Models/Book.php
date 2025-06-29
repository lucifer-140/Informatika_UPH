<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model{

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'published_year',
        'category',
        'isbn',
        'excerpt',
        'cover_image_path',

    ];

    public function borrowingUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_user')
            ->withTimestamps()
            ->withPivot(['borrowed_date', 'returned_date']);
    }

}
