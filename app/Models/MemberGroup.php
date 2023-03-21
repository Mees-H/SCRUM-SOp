<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MemberGroup extends Model
{
    use HasFactory;

    public function members(): BelongsToMany{
        return $this->belongsToMany(
            TeamMember::class,
        'member_in_groups');
    }
}
