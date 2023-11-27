<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverseasDocument extends Model
{
    use HasFactory;

    public function getDocTypeNameAttribute(){
   
         $doc_type = $this->overseas_document_type_id;
        $doc = OverseasDocumentType::where('id',$doc_type)->first();
        return $doc->type;
    }

    public function overseasDocumentType()
    {
        return $this->belongsTo(OverseasDocumentType::class);
    }
    
}
