<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'imgurl' => 'array',
        'fileurl' => 'array'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['sort'] ?? false, function($query, $sort){
            if($sort === 'date_desc'){
                $query->orderBy('date', 'desc');
            }elseif($sort === 'title_asc'){
                $query->orderBy('title', 'asc');
            }
        });
    }
}
