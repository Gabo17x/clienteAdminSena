<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambient extends Model
{
    protected $fillable = [
        'number',
        'capacity',
        'type',
        'status',
        'training_center_id',
        'area_id',
    ];

    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class, 'training_center_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id' );
    }
}
