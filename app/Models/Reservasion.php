<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'date',
        'time',
        'person',
    ];

    public $timestamps = false;
}
