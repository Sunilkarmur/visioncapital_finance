<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeUse extends Model
{
    use HasFactory;

    protected $appends = ['client_document_detail'];

    public function getClientDocumentDetailAttribute()
    {
        return $this->client_documents?json_decode($this->client_documents):null;
    }

}
