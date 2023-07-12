<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'starting_date',
        'ending_date',
        'price',
    ];

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100
        );
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['dateFrom']), function ($query) use ($filters) {
            $query->where('starting_date', '>=', $filters['dateFrom']);
        })->when(isset($filters['dateTo']), function ($query) use ($filters) {
            $query->where('starting_date', '<=', $filters['dateTo']);
        })->when(isset($filters['priceFrom']), function ($query) use ($filters) {
            $query->where('price', '>=', $filters['priceFrom'] * 100);
        })->when(isset($filters['priceTo']), function ($query) use ($filters) {
            $query->where('price', '<=', $filters['priceTo'] * 100);
        });

        if (isset($filters['sortBy'])) {
            $query->orderBy($filters['sortBy'], isset($filters['sortOrder']) && $filters['sortOrder'] === 'desc' ? 'desc' : 'asc');
        }

        return $query;
    }
}
