<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AhliKariah extends Model
{
    use HasFactory;

    protected $fillable = [
        'ahli_kariah_id',
        'ahli_kariah_nric',
        'name_penjaga'
    ];

    protected $guarded = [];

    public function negara(): BelongsTo 
    {
        return $this->belongsTo(Negara::class);
    }

    public function negeri(): BelongsTo 
    {
        return $this->belongsTo(Negeri::class);
    }

    public function bandar(): BelongsTo 
    {
        return $this->belongsTo(Bandar::class);
    }


}
