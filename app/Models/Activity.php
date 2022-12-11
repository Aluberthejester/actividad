<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'state',
        'register_date',
        'finished_date',
        'change_date',
    ];
}
