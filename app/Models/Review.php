<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['review', 'book_id', 'rating'];
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
