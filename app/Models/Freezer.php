<?php

namespace App\Models;

use app\Models\History;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Freezer extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'type',
        'specimen_type',
        'merk',
        'model',
        'capacity',
        'calibration_time',
        'bmn',
        'location',
        'status',
        'picture'
    ];

    public function histories(): HasMany
    {
        return $this->hasMany(History::class);
    }
}
