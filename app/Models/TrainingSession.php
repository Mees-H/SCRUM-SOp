<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    protected $table = 'training_session';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'group_id',
        'Date',
        'StartTime',
        'EndTime',
        'Description',
        'IstrainingSession',
    ];

    public function training_session_group()
    {
        return $this->belongsTo(TrainingSessionGroup::class, 'id');
    }
}
