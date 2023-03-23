<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TeamMember extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function groups(): BelongsToMany{
        return $this->belongsToMany(
            MemberGroup::class,
            'member_in_groups');
    }
}
