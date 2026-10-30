<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class teacher extends Model
{
    protected $fillable = [
        'name',
        'location',
        'area_id',
        'training_center_id',
    ];

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function trainingCenter(): BelongsTo
    {
        return $this->belongsTo(TrainingCenter::class);
    }
}
