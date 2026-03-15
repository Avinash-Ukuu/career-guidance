<?php

namespace App\Models;

use App\Models\Option;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $guarded = ['id'];

    public function skill():BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    public function options():HasMany
    {
        return $this->hasMany(Option::class);
    }
}
