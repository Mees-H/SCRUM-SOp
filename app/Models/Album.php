<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $fillable = ['id', 'title', 'description', 'date'];


    public function picture()
    {
        return $this->hasMany(Picture::class);
    }


}
