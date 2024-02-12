<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingSponsorship extends Model
{
    use HasFactory;

    protected $table = 'building_sponsorship';
    protected $fillable = [
        'building_id',
        'sponsorship_id',
        'starting_date',
        'ending_date'
    ];
}
