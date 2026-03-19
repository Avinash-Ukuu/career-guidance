<?php

namespace App\Models;

use App\Models\Career;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Roadmap extends Model
{
    protected $guarded = ['id'];

    public function career():BelongsTo
    {
        return $this->belongsTo(Career::class);
    }
}
