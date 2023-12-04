<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pencarum extends Model
{
    use HasFactory;

    protected $fillable = [
        'ahli_kariah_id',
        'caruman_id',
        'tarikh_pembayaran',
        'catatan'
    ];   

    protected $guarded = [];  

    public function ahli_kariah(): BelongsTo 
    {
        return $this->belongsTo(AhliKariah::class);
    }    

    public function caruman(): BelongsTo 
    {
        return $this->belongsTo(Caruman::class);
    }    

}
