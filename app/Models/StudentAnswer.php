<?php

namespace App\Models;

use App\Models\Question;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentAnswer extends Model
{
    protected $guarded = ['id'];

    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function question():BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
    public function option():BelongsTo
    {
        return $this->belongsTo(Option::class);
    }
}
