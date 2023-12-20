<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesimen extends Model
{
    use HasFactory;

    protected $fillable = [
        'datetime', // Tambahkan kolom datetime ke dalam properti fillable
        'origin',
        'courier_name',
        'expedition',
        'pic_name',
        'pic_phone',
        'specimen_type',
        'specimen_quantity',
        'specimen_temperature',
        // ... Kolom-kolom lainnya
    ];

    public static function getAllSpesimens()
    {
        return self::all();
    }

    // ... Metode-metode lainnya
}

