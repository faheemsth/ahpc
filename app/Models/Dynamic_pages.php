<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dynamic_pages extends Model
{
    use HasFactory;
    public $table = 'dynamic_pages';
    protected $fillable = [
        'slider1',
        'slider2',
        'slider3',
        'address',
        'email',
        'phone'
    ];
}
