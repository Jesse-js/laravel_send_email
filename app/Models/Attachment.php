<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'pathName',
        'fileName',
        'mimeType',
        'contact_id',
    ];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
