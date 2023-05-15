<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Event extends Model{
    use HasFactory;

    protected $guarded = ['id'];

    public function groups(){
        return $this->belongsToMany(
            Group::class,
            'groups_in_events',
            'event_id',
            'group_id');
    }
}