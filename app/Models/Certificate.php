<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class Certificate extends Model
{
    use HasFactory;

    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'event_id', 
        'participant_id',
        'style',
        'signature',
        
    ];

    protected static function booted()
    {
        static::creating(function (Certificate $certificate) {
            if (empty($certificate->id)) {
                $certificate->id = Str::uuid()->toString();
            }
        });
    }

    
    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function participant(){
        return $this->belongsTo(Participant::class);
    }
}
