<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    protected $fillable = [
        'vouchar_no',
        'discipline_name',
        'amount'
    ];

    public function programs()
    {
        return $this->hasMany(Program::class, 'discipline_id', 'id');
    }
}
