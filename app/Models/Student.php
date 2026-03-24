<?php

namespace App\Models;

use App\Models\Skill;
use App\Models\StudentAnswer;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $guarded = ['id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function skills():BelongsToMany
    {
        return $this->belongsToMany(Skill::class,'student_skill');
    }

    public function studentAnswers():HasMany
    {
        return $this->hasMany(StudentAnswer::class);
    }
}
