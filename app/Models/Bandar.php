<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bandar extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'negeri_id',
        'name'
    ];

    public function negeri(): BelongsTo 
    {
        return $this->belongsTo(Negeri::class);
    }

}
