<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $sort = ['date', 'title'];

    protected $casts = [
        'imgurl' => 'array',
        'fileurl' => 'array'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['date_asc'] ?? false, function ($query, $sort) {
                $query->orderBy('date', 'asc');
        });
        $query->when($filters['date_desc'] ?? false, function ($query, $sort) {
                $query->orderBy('date', 'desc');
        });
    }
}
