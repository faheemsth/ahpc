<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articals extends Model
{
    use HasFactory;
    public $table = 'articals';

    protected $fillable = [
        'feature_image',
            'title',
            'description',
            'button_text',
            'button_link'
        ];
}
