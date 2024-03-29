<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'duration',
        'thumb'
    ];

    public function buildings()
    {
        return $this->belongsToMany(Building::class)->withPivot('starting_date', 'ending_date');
    }
}
