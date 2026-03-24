<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    protected $guarded = ['id'];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
