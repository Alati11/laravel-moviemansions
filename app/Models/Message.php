<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'name',
        'surname',
        'guest_email',
        'text'
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
