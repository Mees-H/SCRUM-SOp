<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\Model;

class Group extends Model{
    use HasFactory;

    protected $guarded = ['id'];

    public function events(){
        return $this->belongsToMany(
            Event::class,
            'groups_in_events',
            'group_id',
            'event_id'
        );
    }
    public function members(){
        return $this->hasMany(GroupMember::class);
    }

}
