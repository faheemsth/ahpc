<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverseasDocumentType extends Model
{
    use HasFactory;

    public function overseasDocuments()
    {
        return $this->hasMany(OverseasDocument::class);
    }
}
