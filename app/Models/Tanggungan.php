<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tanggungan extends Model
{
    use HasFactory;



    protected $guarded = [];

    public function ahli_kariah(): BelongsTo 
    {
        return $this->belongsTo(AhliKariah::class);
    }    

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
