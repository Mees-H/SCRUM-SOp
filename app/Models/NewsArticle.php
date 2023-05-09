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

}
