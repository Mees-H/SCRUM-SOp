<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSessionGroup extends Model
{
    protected $table = 'training_session_group';
    protected $primaryKey = 'GroupNumber';
    public $incrementing = false;
    protected $fillable = [
        'GroupNumber',
        'Name',
    ];

    public function participants()
    {
        return $this->hasMany(Member::class, 'GroupNumber');
    }

    public function trainingsessions()
    {
        return $this->hasMany(TrainingSession::class, 'GroupNumber');
    }
}
