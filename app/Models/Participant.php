<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'Participant';
    protected $primaryKey = 'Id';
    protected $fillable = [
        'Id',
        'Name',
        'GroupNumber',
    ];

    public function training_sessionGroup()
    {
        return $this->belongsTo(TrainingSessionGroup::class, 'GroupNumber');
    }
}
