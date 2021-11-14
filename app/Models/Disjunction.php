<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disjunction extends Model
{
    use HasFactory;

    protected $table = 'disjunctions';
 
    protected $fillable = [
        'nip',
        'write_low',
        'write_mid',
        'practice_low',
        'practice_mid',
        'graduate_not',
        'graduate_yes'
    ];
}
