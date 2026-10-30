<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class apprentice extends Model
{
    protected $fillable = [
        'name',
        'email',
        'number',
        'course_id',
        'computer_id',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(course::class);
    }

    public function computer(): BelongsTo
    {
        return $this->belongsTo(Computer::class);
    }
}
