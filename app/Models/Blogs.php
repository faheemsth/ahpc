<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    public $table = 'blogs';
    protected $fillable = [
    'feature_image',
        'title',
        'description',
        'short_description',
        'related_image1',
        'related_image2',
        'button',
        'button_link'
    ];
}
