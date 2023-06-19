<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSessionGroup extends Model
{
    protected $table = 'training_session_group';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'Name',
    ];

    public function participants()
    {
        return $this->hasMany(Member::class, 'group_id');
    }

    public function trainingsessions()
    {
        return $this->hasMany(TrainingSession::class, 'group_id');
    }
}
