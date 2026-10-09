<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingCenter extends Model
{
    protected $table = 'training_center';

    protected $fillable = ['name', 'location'];
}
