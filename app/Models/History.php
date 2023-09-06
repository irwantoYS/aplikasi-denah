<?php

namespace App\Models;
use App\Models\Freezer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employee_id',
        'datetime',
        'purpose',
        'freezer_id'
    ];

    public function freezer(): BelongsTo
    {
        return $this->belongsTo(Freezer::class);
    }
}
