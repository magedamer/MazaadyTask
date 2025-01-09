<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'body', // For text notes
        'type', // 'text' or 'pdf'
        'is_shared',
        'folder_id',
    ];

    /**
     * Get the folder that owns the note.
     */
    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }
}
