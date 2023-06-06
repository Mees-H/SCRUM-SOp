<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    protected $table = 'training_session';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'Id',
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
