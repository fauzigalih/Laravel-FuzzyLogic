<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conjunction extends Model
{
    use HasFactory;

    protected $table = 'conjunctions';

    protected $fillable = [
        'nip',
        'write_low',
        'write_mid',
        'write_high',
        'practice_low',
        'practice_mid',
        'practice_high'
    ];
}
