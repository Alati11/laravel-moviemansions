<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'time',
        'ip_address'
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
