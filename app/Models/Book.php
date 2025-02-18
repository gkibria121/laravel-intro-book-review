<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', 'LIKE', "%$title%");
    }

    public function scopePopular(Builder $query): Builder
    {

        return $query->withCount('reviews')->orderBy('reviews_count', 'desc');
    }
    public function scopeHighestRating(Builder $query): Builder
    {

        return $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
    }
    public function scopePreviousMonths(Builder $query, int $n = 1): Builder
    {
        $dateS = Carbon::now()->startOfMonth()->subMonth($n);
        $dateE = Carbon::now()->startOfMonth();
        return $query->whereBetween('created_at', [$dateS, $dateE]);
    }
}
