<?php

namespace App\Models;

use App\Models\Roadmap;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Career extends Model
{
    protected $guarded = ['id'];

    public function skills():BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }

    public function roadmaps():HasMany
    {
        return $this->hasMany(Roadmap::class)->orderBy('step');
    }
}
