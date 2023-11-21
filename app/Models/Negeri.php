<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Negeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'negara_id',
        'code',
        'phonecode',
        'name'
    ];

    public function negara(): BelongsTo 
    {
        return $this->belongsTo(Negara::class);
    }
}
