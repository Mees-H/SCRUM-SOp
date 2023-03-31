<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    protected $table = 'training_session';
    protected $primaryKey = 'Id';
    protected $fillable = [
        'Id',
        'GroupNumber',
        'Date',
        'StartTime',
        'EndTime',
        'Description',
        'IstrainingSession',
    ];

    public function training_sessionGroup()
    {
        return $this->belongsTo(TrainingSessionGroup::class, 'GroupNumber');
    }
}
