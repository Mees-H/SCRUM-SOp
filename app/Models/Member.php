<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'Participant';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'Name',
        'group_id',
    ];

    public function training_sessionGroup()
    {
        return $this->belongsTo(TrainingSessionGroup::class, 'id');
    }
}
