<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrgaKariah extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kariah(): BelongsTo 
    {
        return $this->belongsTo(Kariah::class);
    }    

    public function ahlikariah(): BelongsTo 
    {
        return $this->belongsTo(AhliKariah::class);
    }      

}
