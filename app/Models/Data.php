<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'full_name',
        'status'
    ];

    protected $table = 'datas';

    public function result()
    {
        return $this->hasOne(Result::class, 'nip', 'nip');
    }

    public function conjunction()
    {
        return $this->hasOne(Conjunction::class, 'nip', 'nip');
    }

    public function disjunction()
    {
        return $this->hasOne(Disjunction::class, 'nip', 'nip');
    }
}
