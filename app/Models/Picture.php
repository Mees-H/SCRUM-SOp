<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'image',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}
